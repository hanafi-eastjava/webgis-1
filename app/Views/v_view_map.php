<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    const map = L.map('map').setView([-7.192130739980943, 113.24603877572697], 14);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
</script>