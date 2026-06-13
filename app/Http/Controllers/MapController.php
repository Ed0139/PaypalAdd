<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
  public function show()
  {
    return view('maps.show');
  }

  public function search(Request $request)
  {
    $request->validate([
      'city' => 'required',
    ]);

    // Buscar coordenadas
    $mapResponse = Http::withHeaders([
      'User-Agent' => 'Laravel Maps App',
    ])->get('https://nominatim.openstreetmap.org/search', [
      'q' => $request->city,
      'format' => 'json',
      'limit' => 1,
    ]);

    $mapData = $mapResponse->json();

    if (empty($mapData)) {
      return view('maps.show')->with('error', 'No se encontró la ciudad.');
    }

    $lat = $mapData[0]['lat'];
    $lon = $mapData[0]['lon'];

    // Obtener clima
    $weatherResponse = Http::get(
      'https://api.openweathermap.org/data/2.5/weather',
      [
        'lat' => $lat,
        'lon' => $lon,
        'appid' => env('WEATHER_API_KEY'),
        'units' => 'metric',
        'lang' => 'es',
      ],
    );

    $weather = $weatherResponse->json();

    return view('maps.show', [
      'lat' => $lat,
      'lon' => $lon,
      'city' => $mapData[0]['display_name'],
      'weather' => $weather,
    ]);
  }
}
