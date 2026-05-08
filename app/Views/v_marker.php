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

    //marker
    L.marker([-7.18821213450814, 113.24096826021304])
        .bindPopup("<img src='<?= base_url('gambar/alunalun.jpg') ?>' width='250px'>" +
            "<h5>Alun-Alun Sampang</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Alun-Alun

    L.marker([-7.194542476447733, 113.24599855924058])
        .bindPopup("<img src='<?= base_url('gambar/terminal.jpg') ?>' width='250px'>" +
            "<h5>Terminal Sampang</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Terminal

    //custom marker
    const marker1 = L.icon({
        iconUrl: '<?= base_url('marker/hospital.png') ?>',


        iconSize: [35, 95], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    L.marker([-7.19685726302027, 113.2436653970361], {
            icon: marker1
        })
        .bindPopup("<img src='<?= base_url('gambar/rumahsakit.jpg') ?>' width='250px'>" +
            "<h5>Rumah Sakit</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Rumah Sakit

    L.marker([-7.206255175343328, 113.25206478133201])
        .bindPopup("<img src='<?= base_url('gambar/hotel.jpg') ?>' width='250px'>" +
            "<h5>Hotel Bahagia</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Hotel

    L.marker([-7.19061539026846, 113.24608434096308])
        .bindPopup("<img src='<?= base_url('gambar/pasar.jpg') ?>' width='250px'>" +
            "<h5>Pasar Srimangunan</h5><br>" +
            "Kec. Sampang Kota <br>" +
            "Kab. Sampang <br>")
        .addTo(map); //Pasar
</script>