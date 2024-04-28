<?php require './views/includes/header.php'; ?>
<?php
$addressModel = new AddressModel();
$addressController = new AddressController($addressModel);
if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = (float) $_POST['latitude'];
    $longitude = (float) $_POST['longitude'];
    $ndiData = $addressController->searchNdiByAddress($latitude, $longitude);
    if (is_array($ndiData) && array_key_exists('data', $ndiData) && is_array($ndiData['data']['list'])) {
        $ndiList = $ndiData['data']['list'];
    } else {
        $ndiList = [];
    }
} else {
    $ndiList = [];
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
                            <?php if ($ndiItem['ndi_status'] == 'active') : ?>
                                <span class="active"> Active</span>
                            <?php else : ?>
                                <span class="inactive"> Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action='ndiResult' method='POST'>
                                <button class='buttonNumberResult' type='submit' name='submit'><?= $ndiItem['ndi'] ?></button>
                                <input type='hidden' name='phone_number' value='<?= $ndiItem['ndi'] ?>'>
                            </form>
                        </td>
                        <td><?= $ndiItem['name'] ?></td>
                        <td><?= $ndiItem['street_number'] ?></td>
                        <td><?= $ndiItem['street'] ?></td>
                        <td><?= $ndiItem['city'] ?></td>
                        <td><?= $ndiItem['zip'] ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else : ?>
        <p>No NDI data found for the provided address.</p>
    <?php endif; ?>

    <?php if (!isset($_POST['latitude']) && !isset($_POST['longitude'])) : ?>
        <p>No latitude and longitude provided.</p>
    <?php endif; ?>
</div>
</body>

</html>