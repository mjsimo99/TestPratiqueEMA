<?php
require_once 'models/CountryModel.php';
require_once 'controllers/CountryController.php';
require './views/includes/header.php';

$countryModel = new CountryModel();
$countryController = new CountryController($countryModel);

$countryData = null;

if (isset($_POST['submit'])) {
    if (isset($_POST['iso_alpha2'])) {
        $isoAlpha2 = $_POST['iso_alpha2'];
        $countryData = $countryController->searchCountry($isoAlpha2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Country</title>
</head>
<body>
    <h1>Search Country</h1>
    <form method="POST">
        <label for="iso_alpha2">ISO Alpha 2 Code:</label>
        <input type="text" id="iso_alpha2" name="iso_alpha2" placeholder="Enter country code" required>
        <button type="submit" name="submit">Search</button>
    </form>

    <?php if (isset($countryData)) : ?>
        <?php if ($countryData) : ?>
            <h2>Country Data</h2>
            <p>ID: <?= array_key_exists('idcountry', $countryData) ? htmlspecialchars($countryData['idcountry']) : 'N/A' ?></p>
            <p>Country: <?= array_key_exists('country', $countryData) ? htmlspecialchars($countryData['country']) : 'N/A' ?></p>
            <p>ISO Alpha 3: <?= array_key_exists('iso_alpha3', $countryData) ? htmlspecialchars($countryData['iso_alpha3']) : 'N/A' ?></p>
            <p>ISO Alpha 2: <?= array_key_exists('iso_alpha2', $countryData) ? htmlspecialchars($countryData['iso_alpha2']) : 'N/A' ?></p>
            <p>ISO Numeric: <?= array_key_exists('iso_numeric', $countryData) ? htmlspecialchars($countryData['iso_numeric']) : 'N/A' ?></p>
            <p>Dialing Code: <?= array_key_exists('dialing_code', $countryData) ? htmlspecialchars($countryData['dialing_code']) : 'N/A' ?></p>
        <?php else : ?>
            <p>No country data found for the provided code.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>