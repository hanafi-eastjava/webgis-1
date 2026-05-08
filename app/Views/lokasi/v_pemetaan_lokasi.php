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

    //Pemetaan Lokasi

    <?php foreach ($lokasi as $key => $value) { ?>
        L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>])
        .bindPopup('<img src="<?= base_url('foto/'.$value['foto_lokasi']) ?>" width="150px"><br>' + 
            '<b><?= $value['nama_lokasi'] ?></b><br>'+
            'Alamat : <?= $value['alamat_lokasi'] ?>')
        .addTo(map);
    <?php } ?>
</script>