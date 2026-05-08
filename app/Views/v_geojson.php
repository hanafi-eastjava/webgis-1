<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    });

    var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'
    });

    const map = L.map('map', {
        center: [-7.04174323671201, 113.25697121745505],
        zoom: 11,
        layers: [osmHOT]
    });

    const baseLayers = {
        'Layer 2': osmHOT,
        'Layer 1': osm
    };

    const layerControl = L.control.layers(baseLayers, null, {
        collapsed: false
    }).addTo(map);

    //geoJSON
  /*   $.getJSON("<?= base_url('Data_On_Web/Batas_Kabupaten.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function(feature) {
                return {
                    color: 'aqua',
                    fillColor: 'blue',
                    fillOpacity: 0.2,
                }
            }
        }).addTo(map);
    }); */

    $.getJSON("<?= base_url('Data_On_Web/Kec_Banyuates.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function(feature) {
                return {
                    color: '#cc6600',
                    fillColor: '#cc6600',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Banyuates")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Camplong.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#0066cc',
                    fillColor: '#0066cc',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Camplong")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Jrengik.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#669999',
                    fillColor: '#669999',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Jrengik")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Karangpenang.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#6600ff',
                    fillColor: '#6600ff',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Karangpenang")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Kedungdung1.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#669900',
                    fillColor: '#669900',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Kedungdung")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Ketapang.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#cccc00',
                    fillColor: '#cccc00',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Ketapang")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Omben.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#99bbff',
                    fillColor: '#99bbff',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Omben")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Pangarengan.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#006666',
                    fillColor: '#006666',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Pangarengan")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Robatal.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#ffcc99',
                    fillColor: '#ffcc99',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Robatal")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Sampang.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#808000',
                    fillColor: '#808000',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("<img src='<?= base_url('gambar/sampang.jpg') ?>' width='100px'><br>" + "Sampang")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Sokobanah.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#999966',
                    fillColor: '#999966',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Sokobanah")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Sreseh.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#339966',
                    fillColor: '#339966',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Sreseh")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Tambelangan.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#232747',
                    fillColor: '#232747',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Tambelangan")
        .addTo(map);
    });

    $.getJSON("<?= base_url('Data_On_Web/Kec_Torjun.geojson') ?>", function(data) {
        L.geoJson(data, {
            style: function (feature) {
                return {
                    color: '#b4ff05',
                    fillColor: '#b4ff05',
                    fillOpacity: 1,
                }
            }
        })
        .bindPopup("Torjun")
        .addTo(map);
    });
</script>