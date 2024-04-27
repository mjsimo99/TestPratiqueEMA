<?php

// ndiResult.php
require './views/includes/header.php';

$numberPhoneModel = new NumberPhoneModel();
$numberPhoneController = new NumberPhoneController($numberPhoneModel);

if (isset($_POST['submit']) && isset($_POST['phone_number'])) {
    $phoneNumber = $_POST['phone_number'];
    $ndiData = $numberPhoneController->searchNdiByPhoneNumber($phoneNumber);

    if (is_array($ndiData) && array_key_exists('data', $ndiData) && is_array($ndiData['data'])) {
        ?>
        <h2>NDI Data</h2>
        <p>NDI: <?= array_key_exists('ndi', $ndiData['data']) ? htmlspecialchars($ndiData['data']['ndi']) : 'N/A' ?></p>
        <p>NDI Status: <?= array_key_exists('ndi_status', $ndiData['data']) ? htmlspecialchars($ndiData['data']['ndi_status']) : 'N/A' ?></p>
        <?php
        if (array_key_exists('list', $ndiData['data']) && is_array($ndiData['data']['list']) && !empty($ndiData['data']['list'])) :
            ?>
            <h3>List</h3>
            <ul>
                <?php
                foreach ($ndiData['data']['list'] as $item) :
                    ?>
                    <li>
                        <h4><?= array_key_exists('name', $item) ? htmlspecialchars($item['name']) : 'N/A' ?></h4>
                        <p>
                            <?= array_key_exists('street_number', $item) ? htmlspecialchars($item['street_number']) : 'N/A' ?>
                            <?= array_key_exists('street', $item) ? htmlspecialchars($item['street']) : 'N/A' ?>,
                            <?= array_key_exists('zip', $item) ? htmlspecialchars($item['zip']) : 'N/A' ?>
                            <?= array_key_exists('city', $item) ? htmlspecialchars($item['city']) : 'N/A' ?>
                        </p>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        <?php
        endif;
    } else {
        echo "<p>No NDI data found for the provided phone number.</p>";
    }
} else {
    echo "<p>No phone number provided.</p>";
}