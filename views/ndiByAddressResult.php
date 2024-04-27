<?php
// ndiByAdressResult.php
require './views/includes/header.php';

$addressModel = new AddressModel();
$addressController = new AddressController($addressModel);

if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = (float) $_POST['latitude'];
    $longitude = (float) $_POST['longitude'];

    $ndiData = $addressController->searchNdiByAddress($latitude, $longitude);

    if (is_array($ndiData) && array_key_exists('data', $ndiData) && is_array($ndiData['data']['list'])) {
        $ndiList = $ndiData['data']['list'];

        if (!empty($ndiList)) {
            echo "<h2>NDI Found:</h2>";
            echo "<ul>";
            foreach ($ndiList as $ndiItem) {
                echo "<li>Etat: " . $ndiItem['ndi_status'] . "</li>";
                echo "<form action='ndiResult' method='POST'>";
                echo "<button class='buttonNumberResult' type='submit' name='submit'><li>Numéro de telephone: " . $ndiItem['ndi'] . "</li></button>";
                echo "<input type='hidden' name='phone_number' value='" . $ndiItem['ndi'] . "'>";
                echo "</form>";
                echo "<li>Titulaire / Prédécesseur: " . $ndiItem['name'] . "</li>";
                echo "<li>N°voie: " . $ndiItem['street_number'] . "</li>";
                echo "<li>Voie: " . $ndiItem['street'] . "</li>";
                echo "<li>Commune: " . $ndiItem['city'] . "</li>";
                echo "<li>Code postal: " . $ndiItem['zip'] . "</li>";
                echo "<li>Residence: " . "" . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No NDI data found for the provided address.</p>";
        }
    } else {
        echo "<p>No NDI data found for the provided address.</p>";
    }
} else {
    echo "<p>No latitude and longitude provided.</p>";
}
?>

