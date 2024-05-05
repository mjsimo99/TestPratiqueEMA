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
            $url = 'https://demo-xvno.ema.expert/ema/api/v1/endpoint/town/?iso_alpha2=fr&zip=' . $postalCode;
            echo fetchData($url, $username, $password);
            break;
        case 'fetchStreets':
            $idtown = $_POST['idtown'];
            $streetName = $_POST['streetName'];
            $url = 'https://demo-xvno.ema.expert/ema/api/v1/endpoint/street/?idtown=' . $idtown . '&street=' . urlencode($streetName);
            echo fetchData($url, $username, $password);
            break;
        case 'fetchHouseNumbers':
            $idtown = $_POST['idtown'];
            $idstreet = $_POST['idstreet'];
            $number = $_POST['number']; 
            $url = 'https://demo-xvno.ema.expert/ema/api/v1/endpoint/housenumber/?iso_alpha2=fr&idtown=' . $idtown . '&idstreet=' . $idstreet . '&number=' . $number; // Update the URL
            echo fetchData($url, $username, $password);
            break;

    }
    exit;
} else {
    require './views/includes/header.php';
}
?>



<main class="content">
  <h4>Commandes
    <svg width="8px" height="8px" viewBox="-4 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FF5733" stroke="#FF5733">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <title>navigation / 1 - navigation, arrow, chevron, direction, forward, move, right icon</title>
        <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
          <g transform="translate(-751.000000, -674.000000)" id="Group" stroke="#FF5733" stroke-width="2">
            <g transform="translate(745.000000, 672.000000)" id="Shape">
              <polyline points="7 3 17.0011615 12.0021033 7 21.0042067"> </polyline>
            </g>
          </g>
        </g>
      </g>
    </svg>
    Eligibilité
  </h4>
  
  <div class="container-b">
    <div class="recherche-rapide">
      <h2>Recherche rapide</h2>
      <div class="line"></div>
      <form method="POST" action="ndiResult">
        <div class="input-group">

          <div class="input-container">
            <label class="search-labels">VOTRE ADRESSE POSTALE</label>
            <input type="text" placeholder="Ex: 60 Avenue de la Montaigne, Paris, France" disabled>
          </div>
          <div class="input-container">
            <span class="ou">Ou</span>
          </div>
          <div class="input-container">
            <label class="search-labels">VOTRE NUMÉRO DE TÉLÉPHONE</label>
            <input type="tel" id="phone-number-input" name="phone_number" required>
          </div>
          <div class="input-container">
            <span class="ou">Ou</span>
          </div>
          <div class="input-container">
            <label class="search-labels">VOTRE CODE IMMOBILE</label>
            <input type="text" disabled>
          </div>
          <button type="submit" name="submit"  class="btn-recherche" id="search-button">Lancer la recherche</button>
        </div>
        </form>
    </div>



    

    
    <div class="section-b">
      <div class="recherche-avancee">
        <h2>Recherche avancée</h2>
        <div class="line"></div>
        <form action="ndiByAddress" method="POST">
          <div class="input-group-b">
            <div class="input-container">
              <label class="search-labels">Code postal</label>
              <input type="text" placeholder="Ex: 75014" id="postal-code-input" name="postalCode">
            </div>
            <div class="input-container">
              <label class="search-labels">Ville</label>
              <select id="city-select" name="city-select"></select>
            </div>
          </div>
          <div class="input-group-b">
              <!-- <div class="input-container">
                <label class="search-labels">Nom de la voie</label>
                <input type="text" id="street-input" placeholder="Ex: Gambetta" name="street-input">
              </div> -->
              <div class="input-container">
                  <label class="search-labels">Nom de la voie</label>
                  <input type="text" id="street-input" placeholder="Ex: Gambetta" name="street-input" list="street-suggestions">
                  <datalist id="street-suggestions"></datalist>
              </div>
              <div class="input-container">
                  <label class="search-labels">N voie(facultatif)</label>
                  <select id="house-number-select" name="house-number-select">
                      <option value="">Select House Number</option>
                      <?php
                          for ($i = 0; $i <= 80; $i++) {
                              echo "<option value=\"$i\">$i</option>";
                          }
                      ?>
                  </select>            
              </div>
          </div>
          <button class="search_by_idtown_idway btn-recherche" type="submit" name="submit">
              Lancer la recherche</button>
        </form>

        <div class="input-group-b">
          <!-- <span class="ou">
            Ou
          </span> -->
        </div>
        <form action="ndiByAddressResult" method="POST">
          <div class="input-group-b">
            <div class="input-container">
              <label class="search-labels">Latitude</label>
              <input type="text" placeholder="Ex: 47.197255" id="latitude-input" name="latitude">
            </div>
            <div class="input-container">
              <label class="search-labels">Longitude</label>
              <input type="text" placeholder="Ex: -1.504562" id="longitude-input" name="longitude">
            </div>
          </div>
          <button class="btn-recherche">Lancer la recherche</button>
        </form>
      </div>
      <div class="map">
        <div id="map"></div>
      </div>
    </div>

  </div>

</main>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
<script src="../Satoru-MVC1/views/assets/js/main.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../Satoru-MVC1/views/assets/js/ajax.js"></script>

