<!-- ndiresult.php -->
<?php

require './views/includes/header.php';

$numberPhoneModel = new NumberPhoneModel();
$numberPhoneController = new NumberPhoneController($numberPhoneModel);

if (isset($_POST['submit']) && isset($_POST['phone_number'])) {
    $phoneNumber = $_POST['phone_number'];
    $ndiData = $numberPhoneController->searchNdiByPhoneNumber($phoneNumber);
    if (is_array($ndiData) && array_key_exists('data', $ndiData) && is_array($ndiData['data'])) {
        $ndiList = $ndiData['data']['list'];
    } else {
        $ndiList = [];
    }
} else {
    $ndiList = [];
}


$eligibilityModel = new EligibilityModel();
$eligibilityController = new EligibilityController($eligibilityModel);

foreach ($ndiList as $ndiItem) {

$ndi = $ndiData['data']['ndi'];
$ndiStatus = $ndiData['data']['ndi_status'];
$idtown = $ndiItem['idtown'];
$street = $ndiItem['street'];
$number = $ndiItem['street_number'];
$latitude = $ndiItem['latitude'];
$longitude = $ndiItem['longitude'];
}

$data = $eligibilityController->fetchData($ndi, $ndiStatus, $idtown, $street, $number, $latitude, $longitude);
?>

<div class="ndi-dispo">
    <div class="title">
        <a href="index" class="retour">

            Retour
        </a>
        <h3>Les offres éligibles</h3>
    </div>

    <?php if (!empty($ndiList)) : ?>
        <div class="content-b">
            <div class="ndiresult">
                <div class="info">
                    <div class="title-icone">
                        <div>
                            <h2 class="table-title">Votre recherche</h2>
                            <div class="line"></div>
                        </div>
                        <div class="svg-edit">
                        </div>
                    </div>
                    <?php foreach ($ndiList as $ndiItem) : ?>
                        <div>
                            <?= $ndiData['data']['ndi'] ?> , <?= $ndiData['data']['ndi_status'] ?> , <?= $ndiItem['idtown'] ?> , <?= $ndiItem['street'] ?> , <?= $ndiItem['street_number'] ?>, <?= $ndiItem['latitude'] ?> , <?= $ndiItem['longitude'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="map">
                    <div id="mapb"></div>
                </div>
            </div>
            <div>
            <div class="informaion-tech">
                <div class="info-b">
                    <h2 class="table-title">Informations techniques</h2>
                    <div class="line"></div>
                </div>
                <div>
                    <p>Site : <?= $ndiData['data']['site'] ?? 'Non fibré Orange' ?></p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <p>No NDI data found for the provided phone number.</p>
    <?php endif; ?>
    
</div>

<div class="partie-two">
    <div class="next-p">
    <p class="p"> <span class="promo">promo</span>  Formeture rèseau cuivre : promotion de migration vers la fibre jusqu'au 31/12/2023</p>
    </div>

    <div class="right-side">
        <div class="circle">
            <span class="number">100 %</span>
        </div>
        <div class="offre-eli">
            <p class="p-size n-a">offre éligibles <span class="n-offres">10</span></p>
            <p class="p-size">tous réduire 
            </p>
        </div>
    </div>
</div>

<div class="final-side">
    <div class="title-p">
        <div class="final-title">
            <h2>EXECUTIVE ACCESS</h2>
            <div class="line l-b"></div>
        </div>
        <div >
            <p class="final-p">
            reduire
            </p>
        </div>
    </div>

<table>
<thead>
                <tr class="table-header">
                    <th class="th">Opérator</th>
                    <th class="th">Offre</th>
                    <th class="th">Début</th>
                    <th class="th">Engagement</th>
                    <th class="th">Abonnement</th>
                    <th class="th">FAS</th>
                    <th class="th"></th>
                </tr>
            </thead>
            <tbody>
        <?php
        $offerCount = 0;
        foreach ($data as $section) {
            if (isset($section['list'])) {
                foreach ($section['list'] as $mainList) {
                    if (isset($mainList['list'])) {
                        foreach ($mainList['list'] as $offerList) {
                            if (isset($offerList['list'])) {
                                $offerCount += count($offerList['list']);

                                foreach ($offerList['list'] as $offer) {
                                    echo "<tr>";
                                    echo "<td class='td'>" . $offer['provider'] . "</td>";
                                    echo "<td class='td'>" . $offer['offer'] . "</td>";
                                    echo "<td class='td'>"
                                        . "<div class='td-range'>"
                                        . "<span>10 Mb/s</span>"
                                        . "<input type='range' id='speed-range' min='10' max='10000' value='100' step='1'> "
                                        . "<span id='speed-value'>" . $offer['debit'] ."</span>"
                                        . "</div>"
                                        . "</td>";
                                    echo "<td class='td'>";

                                        $engagementOptions = explode(' ', $offer['engagement']);
                                        $engagementValue = (int) $engagementOptions[0];
                                        $engagementUnit = isset($engagementOptions[1]) ? $engagementOptions[1] : '';
                                        
                                        if ($offer['engagement'] === "Sans engagement") {
                                            echo $offer['engagement'];
                                        } else {
                                        
                                            for ($i = 1; $i <= $engagementValue; $i++) {
                                                echo "<label><input type='radio' name='engagement-option' value='$i $engagementUnit'> $i $engagementUnit</label><br>";
                                            }
                                        }
                                        
                                    echo "</td>";
                                    echo "</td>";
                                    echo "<td class='td'>" . $offer['amt_recur'] . "€/Mois</td>";
                                    echo "<td class='td'>" . 'sur devis' . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                }
            }
        }
        echo "<tr><td colspan='7'>Total offers: " . $offerCount . "</td></tr>";
        ?>
    </tbody>
            </table>
</div>

<script>
    const ndiList = <?php echo json_encode($ndiList); ?>;
</script>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
<script src="views/assets/js/map.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
