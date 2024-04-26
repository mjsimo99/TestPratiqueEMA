<?php require './views/includes/header.php'; ?>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
</style>
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



  <!-- 
	<div class="form-searchbynumber">
		<form action="" method="POST">
			<div class="form-group">
				<label for="numero">Numéro de commande</label>
				<input type="text" class="form-control" id="numero" name="numero" placeholder="Entrez le numéro de commande" required>
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Rechercher</button>
		</form>
	</div> -->


  <div class="container-b">
    <div class="recherche-rapide">
      <h2>Recherche rapide</h2>
      <div class="line"></div>
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
          <input type="tel">
        </div>
        <div class="input-container">
          <span class="ou">Ou</span>
        </div>
        <div class="input-container">
          <label class="search-labels">VOTRE CODE IMMOBILE</label>
          <input type="text" disabled>
        </div>
        <button class="btn-recherche">Lancer la recherche</button>
      </div>
    </div>
    
    <div class="section-b">
    <div class="recherche-avancee">
      <h2>Recherche avancée</h2>
      <div class="line"></div>
      <div class="input-group-b">
        <div class="input-container">
          <label class="search-labels">Code postal</label>
          <input type="text" placeholder="Ex: 75014">
        </div>
        <div class="input-container">
          <label class="search-labels">Ville</label>
          <input type="text" placeholder="Pays">
        </div>
      </div>
      <div class="input-group-b">
        <div class="input-container">
          <label class="search-labels">Nom de la voie</label>
          <input type="text" placeholder="Ex: Rue du centre">
        </div>
        <div class="input-container">
          <label class="search-labels">Nde rue</label>
          <input type="tel" placeholder="Ex: 1">
        </div>
      </div>
      <div class="input-group-b">
        <span class="ou">
          Ou
        </span>
      </div>
      <div class="input-group-b">
        <div class="input-container">
          <label class="search-labels">Latitude</label>
          <input type="text" placeholder="Ex: 47.197255" id="latitude-input">
        </div>
        <div class="input-container">
          <label class="search-labels">Longitude</label>
          <input type="text" placeholder="Ex: -1.504562" id="longitude-input">
        </div>
      </div>

      <button class="btn-recherche">Lancer la recherche</button>
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

<script>
  const latitudeInput = document.querySelector('#latitude-input');
  const longitudeInput = document.querySelector('#longitude-input');

  const map = L.map('map').setView([51.505, -0.09], 13);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  let marker = null;

  map.on('click', function(e) {
    if (marker) {
      map.removeLayer(marker);
    }

    marker = L.marker(e.latlng).addTo(map);
    latitudeInput.value = e.latlng.lat.toFixed(6);
    longitudeInput.value = e.latlng.lng.toFixed(6);

    marker.bindPopup(`Latitude: ${e.latlng.lat.toFixed(6)}, Longitude: ${e.latlng.lng.toFixed(6)}`).openPopup();
  });
</script>