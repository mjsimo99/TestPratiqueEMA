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
            <?php

function fetchData() {
    $ndi = "0158460512 ";
    $ndi_status = "inactive";
    $idtown = 94043;
    $street = " AVENUE DE FONTAINEBLEAU"; 
    $number = "0"; 
    $latitude = 48.814606;
    $longitude = 2.361051;

    $apiUrl = "https://demo-xvno.ema.expert/ema/api/v1/retailer_eligibility/?ndi=" . urlencode($ndi) . "&ndi_status=" . urlencode($ndi_status) . "&idtown=" . urlencode($idtown) . "&street=" . urlencode($street) . "&number=" . urlencode($number) . "&latitude=" . urlencode($latitude) . "&longitude=" . urlencode($longitude);

    $username = "14484";
    $password = "3fca31f5bee9e79e6951a1192c991e1fb05fdf9ebe912e4fbdfb6d5feb79663e525e7d36bd10ae271425f232b55b15e8e166bcc65f5d350509d9f5c4e5f8cad5";
    $auth = base64_encode($username . ":" . $password);

    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . $auth
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        return json_encode(array("error" => "Error fetching data: $error"));
    } else {
        $data = json_decode($response, true);
        $offerCount = 0;
        $tableBody = ''; 
        if ($data && isset($data['data'])) {
            foreach ($data['data'] as $section) {
                if (isset($section['list'])) {
                    foreach ($section['list'] as $mainList) {
                        if (isset($mainList['list'])) {
                            foreach ($mainList['list'] as $offerList) {
                                if (isset($offerList['list'])) {
                                    $offerCount += count($offerList['list']);

                                    foreach ($offerList['list'] as $offer) {
                                        echo "<tbody>";

                                        echo "<td class='td'>" . $offer['provider'] . "</td>";
                                        echo "<td class='td'>" . $offer['offer'] . "</td>";
                                        echo "<td class='td'>"
                                            . "<div class='td-range'>"
                                            . "<span>10 Mb/s</span>"
                                            . "<input type='range' id='speed-range' min='10' max='10000' value='100' step='1'> "
                                            . "<span id='speed-value'>1 Gb/s</span>"
                                            . "</div>" 
                                            . "</td>";
                                        echo "<td class='td'>" . $offer['engagement'] . "</td>";
                                        echo "<td class='td'>" . '€'  . "</td>";
                                        echo "<td class='td'>" . '€' . "</td>";
                                        

                                        echo "</tbody>";

                                    }
                                }
                            }
                        }
                    }
                }
                echo "total offers: " . $offerCount;

            }
        } else {
            return json_encode(array("error" => "No data found."));
        }
    }
}

echo fetchData();

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
