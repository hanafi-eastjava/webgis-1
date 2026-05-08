<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi">
        </div>
    </div>
</div>

<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    });

    var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'
    });

    const baseLayers = {
        'Layer 2': osmHOT,
        'Layer 1': osm
    };


    //geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert('Geolocation tidak support yang anda gunakan');
    }

    function showPosition(position) {
        document.getElementById("Posisi").value = position.coords.latitude + " , " + position.coords.longitude;
        //Menampilkan posisi pada map
        const map = L.map('map', {
            center: [position.coords.latitude, position.coords.longitude],
            zoom: 14,
            layers: [osmHOT]
        });

        const layerControl = L.control.layers(baseLayers, null, {
            collapsed: false
        }).addTo(map);

        //marker posisi user
        L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
        .bindPopup('Posisi Anda')
            .openPopup();
    }
</script>