

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
