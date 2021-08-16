const locations = document.getElementById('map');
console.log(locations);

mapboxgl.accessToken = 'pk.eyJ1IjoicmF6dmFucGV0cnUiLCJhIjoiY2tvZHd4aGs2MDZtMTJ1cXBveTA1ODVmcyJ9.rC_jUT8sjS7znLjRB4d7Cw';

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/light-v9',
  center: [26.100666290339458, 44.43314299845954],
  zoom: 10
});

const bounds = new mapboxgl.LngLatBounds();


  // create marker
  const el = document.createElement('div');
  el.className = 'marker';

  // add marker
  new mapboxgl.Marker({
    element: el,
    anchor: 'bottom'
  })
    .setLngLat(locations.coordinates)
    .addTo(map);

  new mapboxgl.Popup({
    offset: 30
  })
  .setLngLat(locations.coordinates)
  .setHTML(`<p>${locations.description}</p>`)
  .addTo(map)

// extend map bounds to include current location
bounds.extend(locations.coordinates);

map.fitBounds(bounds, {
  padding: {
    top: 200,
    bottom: 200,
    left: 100,
    right: 100
  }
});

// add markers to map
geojson.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el)
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);
});



/*
{
        "country": "Romania",
        "town": "Bucuresti",
        "name": "Europa Royale Bucharest",
        "address": "Str. Franceza 60, Sector 3, 030106 București, România",
        "location": {
            "_id": "1",
            "description": "Europa Royale Bucharestd",
            "type": "Point",
            "coordinates": [26.06213448465732, 44.48135653336092]
        },
        "ratingsQuantity": 3.684,
        "ratingsAverage": 8.9,
        "price": 420,
        "summary": "Aflat într-o clădire din secolul al XIX-lea situată chiar în inima Bucureştiului, Europa Royale Bucharest oferă camere cu aer condiționat şi un restaurant care servește meniuri internaționale. În întregul hotel este disponibil acces gratuit la internet WiFi.",
        "description": "Aflat într-o clădire din secolul al XIX-lea situată chiar în inima Bucureştiului, Europa Royale Bucharest oferă camere cu aer condiționat şi un restaurant care servește meniuri internaționale. În întregul hotel este disponibil acces gratuit la internet WiFi. Camerele sunt moderne și decorate în nuanțe de verde şi maro și includ TV prin cablu, aer condiționat şi minibar. Fiecare baie are duș sau cadă, uscător de păr şi articole de toaletă gratuite. Camerele de la etajul 4 beneficiază de vedere deosebită la Piața Unirii şi la Hanul lui Manuc. Datorită locației centrale a hotelului, oaspeții pot ajunge cu ușurință la numeroasele baruri şi restaurante din centrul vechi. Europa Royale se află la 50 de metri de stația de metrou Piața Unirii şi la 4,5 km de Gara de Nord. La cerere şi la un cost suplimentar, se asigură un serviciu de transfer de la/la Aeroportul Internațional Henri Coandă, situat la 20 km. Acesta este locul preferat de turiștii din București, conform comentariilor independente. Cuplurile apreciază în mod deosebit această locaţie. I-au dat scorul 9,7 pentru un sejur pentru 2 persoane. Vorbim limba dumneavoastră!",
        "stars": 4,
        "imageCover": "europa-royale-cover.jpg",
        "images": ["europa-royale01.jpg", "europa-royale02.jpg", "europa-royale03.jpg"],
        "startDates": ["2021-05-01", "2021-05-02", "2021-05-03"]
    }

*/