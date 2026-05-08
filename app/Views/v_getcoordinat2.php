<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi">
        </div>
    </div>
</div>

<div class="col-sm-12">
    <br>
    <div id="map" style="width: 100%; height: 100vh;"></div>
</div>

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

    //getcoordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");
    var curLocation = [-7.192130739980943, 113.24603877572697];
    map.attributionControl.setPrefix(false);


    //radius
    var circle = L.circle([-7.192130739980943, 113.24603877572697], {
        radius: 1000,
        color: 'blue',
    }).addTo(map); //Monumen

    var marker = L.marker([-7.192130739980943, 113.24603877572697], {
        draggable: true,
    });
    //mengambil koordinat saat marker dipindah/digeser
    marker.on('dragend', function(event) {
        var latlng = event.target.getLatLng();
        var distance = latlng.distanceTo(circle.getLatLng());

        if (distance <= circle.getRadius()) {
            //jika koordinat dalam radius
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ' , ' + latlng.lng;
        } else {
            //jika koordinat diluar radius
            alert('Maaf koordinat yang diklik berada diluar jangkauan');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }
    });


    //mengambil koordinat saat map diklik
    map.on('click', function(event) {
        var latlng = event.latlng;
        var distance = latlng.distanceTo(circle.getLatLng());

        if (distance <= circle.getRadius()) {

            if (!marker) {
                marker = L.marker(event.latlng).addTo(map);
            } else {
                marker.setLatLng(event.latlng);
            }
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ' , ' + latlng.lng;
        } else {
            alert('Maaf koordinat yang diklik berada diluar jangkauan');
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }

        latInput.value = lat;
        lngInput.value = lng;
        posisi.value = lat + ' , ' + lng;
    });

    map.addLayer(marker);
</script>