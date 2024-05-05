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

    $url = 'https://demo-xvno.ema.expert/ema/api/v1/endpoint/street/?idtown=' . $idtown . '&street=' . urlencode($streetName);
    $streetResponse = json_decode(fetchData($url, $username, $password), true);

    if (is_array($streetResponse) && !empty($streetResponse)) {
        $idway = $streetResponse[0]['idway'];

        $url = 'https://demo-xvno.ema.expert/ema/api/v1/address/ndi_by_address/?idtown=' . $idtown . '&idway=' . $idway;
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


?>


<div class="ndi-dispo">
    <div class="title">
        <a href="index" class="retour">
            <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Retour
        </a>
        <h3>NDI Disponibles</h3>
    </div>

    <?php if (!empty($ndiList)) : ?>
        <div class="table-container">
            <h2 class="table-title">Sélectionnez votre numéro de téléphone</h2>
            <div class="line"></div>
            <table>
                <tr class="table-header">
                    <th>Etat</th>
                    <th>Numéro de téléphone</th>
                    <th>Titulaire / Prédécesseur</th>
                    <th>N°voie</th>
                    <th>Voie</th>
                    <th>Commune</th>
                    <th>Code postal</th>
                    <th>Residence</th>
                </tr>
                <?php foreach ($ndiList as $ndiItem) : ?>
                <tr>
                    <td>NDI
                        <?php if (isset($ndiItem['ndi_status']) && $ndiItem['ndi_status'] == 'active') : ?>
                            <!-- Check if 'ndi_status' key is set and its value is 'active' -->
                            <span class="active"> Active</span>
                        <?php else : ?>
                            <span class="inactive"> Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action='ndiResult' method='POST'>
                            <button class='buttonNumberResult' type='submit' name='submit'>
                                <?php echo isset($ndiItem['ndi']) ? $ndiItem['ndi'] : ''; ?>
                            </button>
                            <input type='hidden' name='phone_number' value='<?php echo isset($ndiItem['ndi']) ? $ndiItem['ndi'] : ''; ?>'>
                        </form>
                    </td>
                    <td><?php echo isset($ndiItem['name']) ? $ndiItem['name'] : ''; ?></td>
                    <td><?php echo isset($ndiItem['street_number']) ? $ndiItem['street_number'] : ''; ?></td>
                    <td><?php echo isset($ndiItem['street']) ? $ndiItem['street'] : ''; ?></td>
                    <td><?php echo isset($ndiItem['city']) ? $ndiItem['city'] : ''; ?></td>
                    <td><?php echo isset($ndiItem['zip']) ? $ndiItem['zip'] : ''; ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <p>No NDI data found for the provided address.</p>
    <?php endif; ?>

</div>
</body>

</html>
