<?php

require_once 'app/Classes/config/config.php';

$username = API_USERNAME;
$password = API_PASSWORD;

function setupCurl($url, $username, $password) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    return $curl;
}

function fetchData($url, $username, $password) {
    $curl = setupCurl($url, $username, $password);
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        throw new RuntimeException("Curl error: $error");
    }

    return $response;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $idtown = $_POST['city-select'];
    $streetName = $_POST['street-input'];

    $url = STREET_API_URL . '?idtown=' . $idtown . '&street=' . urlencode($streetName);
    $streetResponse = json_decode(fetchData($url, $username, $password), true);

    if (is_array($streetResponse) && !empty($streetResponse)) {
        $idway = $streetResponse[0]['idway'];

        $url = ADDRESS_API_URL . '?idtown=' . $idtown . '&idway=' . $idway;
        $ndiData = json_decode(fetchData($url, $username, $password), true);

        if (isset($ndiData['response']) && $ndiData['response'] === true) {
            $ndiList = $ndiData['data']['list'];
            require './views/includes/header.php';
        } else {
            require './views/includes/header.php';
            echo "<p>No NDI data found for the provided address.</p>";
        }
    } else {
        require './views/includes/header.php';
        echo "<p>No streets found for the provided town and street name.</p>";
    }
} else {
    require './views/includes/header.php';
}
