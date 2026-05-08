<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Jarak (*Meter)</label>
            <input class="form-control" name="jarak" id="Jarak">
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

    //geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude), //lokasi user
                    L.latLng(-7.21215942814221, 113.26470558796562) //lokasi tujuan
                ]
            }).addTo(map);
            //Mengambil jarak
            routingControl.on('routesfound', function(e) {
                var routes = e.routes;
                var summary = routes[0].summary;
                var totalDistance = summary.totalDistance;
                //Kirim nilai jaraknya ke elemen input
                document.getElementById('Jarak').value = totalDistance;
                animasiCar(routes[0]);
            });
        });
        //membuat animasi perjalanan
        function animasiCar(route) {
            var iconMobil = L.icon({
                iconUrl: '<?= base_url('gambar/inova_rebond.png') ?>',
                iconSize: [50, 60], // size of the icon
            });
            var mobil = L.marker([route.coordinates[0].lat, route.coordinates[0].lng], {
                icon: iconMobil
            }).addTo(map);

            var index = 0;
            var maxIndex = route.coordinates.length - 1;

            function animate() {
                mobil.setLatLng([route.coordinates[index].lat, route.coordinates[index].lng]);
                index++;
                if (index > maxIndex) {
                    index = 0;
                }
                setTimeout(animate, 100);
            }
            animate();
        }
    } else {
        alert('Geolocation tidak support yang anda gunakan');
    }

    //Rute
</script>