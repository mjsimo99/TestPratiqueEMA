document.addEventListener('DOMContentLoaded', function() {
    const map = L.map('mapb');
    const bounds = L.latLngBounds([]);
  
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
  
    ndiList.forEach(function(ndiItem) {
      const marker = L.marker([ndiItem.latitude, ndiItem.longitude]).addTo(map);
      bounds.extend([ndiItem.latitude, ndiItem.longitude]);
      marker.bindPopup(`
        <p>${ndiItem.street_number} ${ndiItem.street}, ${ndiItem.zip} ${ndiItem.city}</p>
        <p>NDI ${ndiItem.ndi ?? 'Aucun NDI trouvé'}</p>
        <p>GPS ${ndiItem.latitude}, ${ndiItem.longitude}</p>
      `);
    });
  
    if (ndiList.length > 0) {
      map.fitBounds(bounds, { maxZoom: 14 });
    } else {
      map.setView([51.505, -0.09], 13);
    }
  });