@props(['serverLatitude', 'serverLongitude'])

<div>
    <link
  href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css"
  rel="stylesheet"
    />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <div id="map" class="mt-5" style="width: 100%; height: 400px;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            mapboxgl.accessToken = "{{ env('MAPBOX_API_KEY') }}";

            const latitude = {{ $serverLatitude }};
            const longitude = {{ $serverLongitude }};

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [longitude, latitude],
                zoom: 14,
            });

            new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        });
    </script>
</div>
