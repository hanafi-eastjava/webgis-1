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

    //polyline
    L.polyline([
        [-7.196507729556513, 113.23777101045262],
        [-7.195069064116054, 113.23782328142556],
        [-7.194732707334249, 113.2367357118784]
    ], {
        color: 'red',
        weight: 3,
    })
    .bindPopup(
            "<h5>Jalan Sampang</h5><br>" +
            "Panjang: 200 meter <br>" +
            "Lebar: 5 meter <br>")
    .addTo(map);

    L.polyline([
        [-7.185088716814283, 113.23733931201791],
        [-7.185878313681642, 113.23686180377247],
        [-7.187071479678236, 113.23673800533847],
        [-7.187422410257428, 113.23751616692365],
        [-7.188134904691221, 113.23701348452306],
    ], {
        color: 'green',
        weight: 1,
    }).addTo(map);

    // map.fitBounds(polyline.getBounds()); ini ketika ngezoom otomatis
</script>