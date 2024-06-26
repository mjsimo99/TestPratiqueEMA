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
            <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
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
                            <svg fill="#FF5733" width="17px" height="17px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" transform="rotate(90)" stroke="#FF5733"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M277.974 49.076c65.267-65.379 171.733-65.49 237.448 0l232.186 232.187 1055.697 1055.809L1919.958 1920l-582.928-116.653-950.128-950.015 79.15-79.15 801.792 801.68 307.977-307.976-907.362-907.474L281.22 747.65 49.034 515.464c-65.379-65.603-65.379-172.069 0-237.448Zm1376.996 1297.96-307.977 307.976 45.117 45.116 384.999 77.023-77.023-385-45.116-45.116ZM675.355 596.258l692.304 692.304-79.149 79.15-692.304-692.305 79.149-79.15ZM396.642 111.88c-14.33 0-28.547 5.374-39.519 16.345l-228.94 228.94c-21.718 21.718-21.718 57.318 0 79.149l153.038 153.037 308.089-308.09-153.037-153.036c-10.972-10.971-25.301-16.345-39.63-16.345Z" fill-rule="evenodd"></path> </g></svg>
                        </div>
                    </div>
                    <?php foreach ($ndiList as $ndiItem) : ?>
                        <div>
                            <p> <?= $ndiItem['street_number'] ?> <?= $ndiItem['street'] ?>, <?= $ndiItem['zip'] ?> <?= $ndiItem['city'] ?> </p>
                            <p>NDI <?= $ndiData['data']['ndi'] ?? 'Aucun NDI trouvé' ?> </p>
                            <p>GPS <?= $ndiItem['latitude'] ?>, <?= $ndiItem['longitude'] ?></p>
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
                <p class="p"> <span class="promo">promo</span> Formeture rèseau cuivre : promotion de migration vers la fibre jusqu'au 31/12/2023</p>
            </div>

            <div class="right-side">
                <div class="circle">
                    <span class="number">100 %</span>
                </div>
                <div class="offre-eli">
                    <p class="p-size n-a">offre éligibles <span class="n-offres">
                            <?php
                            $offerCount = 0;
                            foreach ($data as $section) {
                                if (isset($section['list'])) {
                                    foreach ($section['list'] as $mainList) {
                                        if (isset($mainList['list'])) {
                                            foreach ($mainList['list'] as $offerList) {
                                                if (isset($offerList['list'])) {
                                                    $offerCount += count($offerList['list']);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            echo $offerCount;
                            ?>
                        </span></p>
                        <p class="p-size">tous réduire 
                            <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="6px" height="6px" viewBox="0 0 451.847 451.846" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M248.292,106.406l194.281,194.29c12.365,12.359,12.365,32.391,0,44.744c-12.354,12.354-32.391,12.354-44.744,0 L225.923,173.529L54.018,345.44c-12.36,12.354-32.395,12.354-44.748,0c-12.359-12.354-12.359-32.391,0-44.75L203.554,106.4 c6.18-6.174,14.271-9.259,22.369-9.259C234.018,97.141,242.115,100.232,248.292,106.406z"></path> </g> </g></svg>
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
                <div>
                    <p class="final-p">
                        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="6px" height="6px" viewBox="0 0 451.847 451.846" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M248.292,106.406l194.281,194.29c12.365,12.359,12.365,32.391,0,44.744c-12.354,12.354-32.391,12.354-44.744,0 L225.923,173.529L54.018,345.44c-12.36,12.354-32.395,12.354-44.748,0c-12.359-12.354-12.359-32.391,0-44.75L203.554,106.4 c6.18-6.174,14.271-9.259,22.369-9.259C234.018,97.141,242.115,100.232,248.292,106.406z"></path> </g> </g></svg>
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
                                                if (preg_match('/^(\d+)(?=Mb|Kb)/', $offer['debit'], $matches) && ($matches[1] <= 10 || $offer['debit'] == '512Kb')) {
                                                    if ($offer['debit'] == '512Kb') {
                                                        echo "<td class='td'>" . '512Kb/s' . "</td>";
                                                    } else {
                                                        $maxValue = preg_replace('/[^0-9]/', '', $offer['debit']);
                                                        echo "<td class='td'>" . "<div class='td-range'>" .
                                                            "<span>512 Kb/s</span>" .
                                                            "<input type='range' class='speed-range' max='$maxValue' step='1'> " .
                                                            "<span class='speed-value'>" . preg_replace('/\D/', '', $offer['debit']) . substr($offer['debit'], strlen(preg_replace('/\D/', '', $offer['debit'])), 2) . "/s" . "</span>" .
                                                            "</div>" .
                                                            "<br>" .
                                                            "<span class='selected-range'></span>" .
                                                            "</td>";
                                                    }
                                                } else {
                                                    $maxValue = preg_replace('/[^0-9]/', '', $offer['debit']);
                                                    echo "<td class='td'>" . "<div class='td-range'>" .
                                                        "<span>10Mb/s</span>" .
                                                        "<input type='range' class='speed-range' max='$maxValue' step='1'> " .
                                                        "<span class='speed-value'>" . preg_replace('/\D/', '', $offer['debit']) . substr($offer['debit'], strlen(preg_replace('/\D/', '', $offer['debit'])), 2) . "/s" . "</span>" .
                                                        "</div>" .
                                                        "<br>" .
                                                        "<span class='selected-range'></span>" .
                                                        "</td>";
                                                }
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
                                                echo ' <td class="td"> <button class="btn-command"> <svg class="pay" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .open_een{fill:#ffffff;} </style> <g> <g> <path class="open_een" d="M28.5,26h-25C2.673,26,2,25.327,2,24.5v-14C2,10.224,2.224,10,2.5,10H29V7.5C29,7.224,28.776,7,28.5,7 h-25C3.224,7,3,7.224,3,7.5C3,7.776,2.776,8,2.5,8S2,7.776,2,7.5C2,6.673,2.673,6,3.5,6h25C29.327,6,30,6.673,30,7.5v3 c0,0.276-0.224,0.5-0.5,0.5H3v13.5C3,24.776,3.224,25,3.5,25h25c0.276,0,0.5-0.224,0.5-0.5v-11c0-0.276,0.224-0.5,0.5-0.5 s0.5,0.224,0.5,0.5v11C30,25.327,29.327,26,28.5,26z"></path> <path class="open_een" d="M7.5,17h-1C5.673,17,5,16.327,5,15.5v-1C5,13.673,5.673,13,6.5,13h1C8.327,13,9,13.673,9,14.5v1 C9,16.327,8.327,17,7.5,17z M6.5,14C6.224,14,6,14.224,6,14.5v1C6,15.776,6.224,16,6.5,16h1C7.776,16,8,15.776,8,15.5v-1 C8,14.224,7.776,14,7.5,14H6.5z"></path> <path class="open_een" d="M8.5,23h-3C5.224,23,5,22.776,5,22.5S5.224,22,5.5,22h3C8.776,22,9,22.224,9,22.5S8.776,23,8.5,23z"></path> <path class="open_een" d="M14.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S14.776,23,14.5,23z"></path> <path class="open_een" d="M20.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S20.776,23,20.5,23z"></path> <path class="open_een" d="M26.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S26.776,23,26.5,23z"></path> <path class="open_een" d="M20.5,20h-15C5.224,20,5,19.776,5,19.5S5.224,19,5.5,19h15c0.276,0,0.5,0.224,0.5,0.5S20.776,20,20.5,20 z"></path> </g> <g> <path class="open_een" d="M28.5,26h-25C2.673,26,2,25.327,2,24.5v-14C2,10.224,2.224,10,2.5,10H29V7.5C29,7.224,28.776,7,28.5,7 h-25C3.224,7,3,7.224,3,7.5C3,7.776,2.776,8,2.5,8S2,7.776,2,7.5C2,6.673,2.673,6,3.5,6h25C29.327,6,30,6.673,30,7.5v3 c0,0.276-0.224,0.5-0.5,0.5H3v13.5C3,24.776,3.224,25,3.5,25h25c0.276,0,0.5-0.224,0.5-0.5v-11c0-0.276,0.224-0.5,0.5-0.5 s0.5,0.224,0.5,0.5v11C30,25.327,29.327,26,28.5,26z"></path> <path class="open_een" d="M7.5,17h-1C5.673,17,5,16.327,5,15.5v-1C5,13.673,5.673,13,6.5,13h1C8.327,13,9,13.673,9,14.5v1 C9,16.327,8.327,17,7.5,17z M6.5,14C6.224,14,6,14.224,6,14.5v1C6,15.776,6.224,16,6.5,16h1C7.776,16,8,15.776,8,15.5v-1 C8,14.224,7.776,14,7.5,14H6.5z"></path> <path class="open_een" d="M8.5,23h-3C5.224,23,5,22.776,5,22.5S5.224,22,5.5,22h3C8.776,22,9,22.224,9,22.5S8.776,23,8.5,23z"></path> <path class="open_een" d="M14.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S14.776,23,14.5,23z"></path> <path class="open_een" d="M20.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S20.776,23,20.5,23z"></path> <path class="open_een" d="M26.5,23h-3c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h3c0.276,0,0.5,0.224,0.5,0.5 S26.776,23,26.5,23z"></path> <path class="open_een" d="M20.5,20h-15C5.224,20,5,19.776,5,19.5S5.224,19,5.5,19h15c0.276,0,0.5,0.224,0.5,0.5S20.776,20,20.5,20 z"></path> </g> </g> </g></svg> Commender</button> </td> ';
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
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
        <script src="views/assets/js/map.js"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="views/assets/js/jquery.js"></script>