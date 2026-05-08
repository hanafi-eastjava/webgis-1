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

    //polygon
    L.polygon([
            [-7.187309225393653, 113.24044347712848],
            [-7.188099519691707, 113.24191969382615],
            [-7.189456594640253, 113.24113097346857],
            [-7.18866349921287, 113.2397240652823],
        ])
        .addTo(map);

    L.polygon([
            [-7.1854769036439015, 113.2420930431714],
            [-7.185166957594857, 113.24280734961044],
            [-7.185233125869958, 113.2429547740346],
            [-7.185358497312117, 113.24299689529866],
            [-7.185468197295639, 113.243000405404],
            [-7.185546554415611, 113.24296354929572],
            [-7.185685855919818, 113.2428968572943],
            [-7.185854758936392, 113.24285649108292],
            [-7.185886101757295, 113.24208777801407],
            [-7.18575202411935, 113.24210006338275],
            [-7.185705009873307, 113.24205618706603],
        ], {
            color: 'green',
        })
        .bindPopup('<h5>Tanah Aset Polres Sampang</h5>' +
            'Luas Tanah: Kurang Tau <br>' +
            'Hak Milik: Polres Sampang <br>'
        )
        .addTo(map);
</script>