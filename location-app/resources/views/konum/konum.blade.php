<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>
<script src="https://unpkg.com/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.js"></script>

<x-layout>
 
<div id="map" style="height: 600px;"></div>

<script>
    var map = L.map('map').setView([{{ $veri->enlem }}, {{ $veri->boylam }}], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    const myCustomColour = '#{{ $veri->renk }}'

    var icon = L.icon.pulse({ color: myCustomColour, fillColor: myCustomColour, animate: true, iconSize:[20,20]});

    L.marker([{{ $veri->enlem }}, {{ $veri->boylam }}], {icon: icon}).addTo(map);
</script>
</x-layout>

