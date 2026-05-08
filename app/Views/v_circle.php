<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    });

    var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'
    });

    const map = L.map('map', {
        center: [-7.192130739980943, 113.24603877572697],
        zoom: 14,
        layers: [osmHOT]
    });

    const baseLayers = {
        'Layer 2': osmHOT,
        'Layer 1': osm
    };

    const layerControl = L.control.layers(baseLayers, null, {
        collapsed: false
    }).addTo(map);


    //circle

    L.circle([-7.19568154339724, 113.25100715471605], {
            radius: 200,
            color: 'blue',
        })
        .bindPopup('Monumen Trunojoyo')
        .addTo(map); //Monumen

    L.marker([-7.179940114935542, 113.2479225519178]).addTo(map);
    L.circle([-7.179940114935542, 113.2479225519178], {
        radius: 800,
        color: 'green',
    }).addTo(map); //Futsal

    L.circle([-7.18821213450814, 113.24096826021304], {
            radius: 200,
            color: 'aqua',
            fillColor: 'yellow',
            fillOpacity: 0.5,
        })
        .bindPopup("<img src='<?= base_url('gambar/alunalun.jpg') ?>' width='250px'>" +
            "<h5>Alun-Alun Sampang</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Alun Alun

    L.circle([-7.182434039894415, 113.23451645846362], {
        radius: 400,
        color: 'red',
        fillColor: 'blue',
        fillOpacity: 1,
    }).addTo(map); //SPBU
</script>