<div class="row">
    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php $errors = validation_errors() ?>
            <?php echo form_open_multipart('Lokasi/insertData') ?>


            <div class="form-group">
                <label>Nama Lokasi</label>
                <input class="form-control" name="nama_lokasi">
                <p class="text-danger"><?= isset($errors['nama_lokasi']) == isset($errors['nama_lokasi']) ? validation_show_error('nama_lokasi') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Alamat Lokasi</label>
                <input class="form-control" name="alamat_lokasi">
                <p class="text-danger"><?= isset($errors['alamat_lokasi']) == isset($errors['alamat_lokasi']) ? validation_show_error('alamat_lokasi') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input class="form-control" name="latitude" id="Latitude">
                <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude']) ? validation_show_error('latitude') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input class="form-control" name="longitude" id="Longitude">
                <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude']) ? validation_show_error('longitude') : '' ?></p>
            </div>

            <div class="form-group">
                <label>Foto Lokasi</label>
                <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
                <p class="text-danger"><?= isset($errors['foto_lokasi']) == isset($errors['foto_lokasi']) ? validation_show_error('foto_lokasi') : '' ?></p>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>

            <?php echo form_close() ?>
        </div>

    </div>
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

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    //mengambil koordinat saat marker dipindah/digeser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation,
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng);
    })

    //mengambil koordinat saat map diklik
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
        posisi.value = lat + ' , ' + lng;
    });

    map.addLayer(marker);
</script>