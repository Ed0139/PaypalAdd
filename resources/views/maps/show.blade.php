<!DOCTYPE html>
<html>
<head>
    <title>Mapa + Clima</title>

    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet/dist/leaflet.css"
    />

    <style>

        body{
            font-family: Arial;
            margin:20px;
        }

        #map{
            height:500px;
            width:100%;
            margin-top:20px;
        }

        .info{
            margin-top:20px;
            padding:15px;
            border:1px solid #ccc;
            border-radius:10px;
        }

    </style>
</head>
<body>

<h1>Buscar Ciudad</h1>

<form action="/mapa" method="POST">
    @csrf

    <input
        type="text"
        name="city"
        placeholder="Ej. Papantla"
        required
    >

    <button type="submit">
        Buscar
    </button>

</form>

<button onclick="obtenerUbicacion()">
    Mi ubicación actual
</button>

@if(isset($error))
    <p>{{ $error }}</p>
@endif

@if(isset($lat))

<div class="info">

    <h2>{{ $city }}</h2>

    <p>
        <strong>Latitud:</strong>
        {{ $lat }}
    </p>

    <p>
        <strong>Longitud:</strong>
        {{ $lon }}
    </p>

    <h3>Clima actual</h3>

    <p>
        Temperatura:
        {{ $weather['main']['temp'] }} °C
    </p>

    <p>
        Sensación térmica:
        {{ $weather['main']['feels_like'] }} °C
    </p>

    <p>
        Humedad:
        {{ $weather['main']['humidity'] }} %
    </p>

    <p>
        Clima:
        {{ $weather['weather'][0]['description'] }}
    </p>

</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var map = L.map('map').setView(
    [{{ $lat }}, {{ $lon }}],
    13
);

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution:
        '&copy; OpenStreetMap contributors'
    }
).addTo(map);

L.marker(
    [{{ $lat }}, {{ $lon }}]
)
.addTo(map)
.bindPopup("{{ $city }}")
.openPopup();

</script>

@endif

</body>
</html>