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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $action = $_POST['action'];

    switch ($action) {
        case 'fetchTowns':
            $postalCode = $_POST['postalCode'];
            $url = TOWN_API_URL . '?iso_alpha2=fr&zip=' . $postalCode;
            echo fetchData($url, $username, $password);
            break;
        case 'fetchStreets':
            $idtown = $_POST['idtown'];
            $streetName = $_POST['streetName'];
            $url = STREET_API_URL . '?idtown=' . $idtown . '&street=' . urlencode($streetName);
            echo fetchData($url, $username, $password);
            break;
        case 'fetchHouseNumbers':
            $idtown = $_POST['idtown'];
            $idstreet = $_POST['idstreet'];
            $number = $_POST['number']; 
            $url = HOUSE_NUMBER_API_URL . '?iso_alpha2=fr&idtown=' . $idtown . '&idstreet=' . $idstreet . '&number=' . $number; 
            echo fetchData($url, $username, $password);
            break;
    }
    exit;
} else {
    require './views/includes/header.php';
}