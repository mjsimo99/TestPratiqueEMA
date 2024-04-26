<?php



$countryModel = new CountryModel();
$countryController = new CountryController($countryModel);
$countryData = $countryController->fetchCountryData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Data</title>
</head>
<body>
    <h1>Country Data</h1>

    <?php if ($countryData) : ?>
        <p>ID: <?= htmlspecialchars($countryData['idcountry']) ?></p>
        <p>Country: <?= htmlspecialchars($countryData['country']) ?></p>
        <p>ISO Alpha 3: <?= htmlspecialchars($countryData['iso_alpha3']) ?></p>
        <p>ISO Alpha 2: <?= htmlspecialchars($countryData['iso_alpha2']) ?></p>
        <p>ISO Numeric: <?= htmlspecialchars($countryData['iso_numeric']) ?></p>
        <p>Dialing Code: <?= htmlspecialchars($countryData['dialing_code']) ?></p>
    <?php else : ?>
        <p>Failed to fetch country data.</p>
    <?php endif; ?>
</body>
</html>