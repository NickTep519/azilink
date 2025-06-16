<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityImageController extends Controller
{
    public function fetchCityImage($city)
    {
        $apiKey = env('UNSPLASH_API_KEY'); // Clé API Unsplash

        $response = Http::withOptions(['verify' => false])->get("https://api.unsplash.com/search/photos", [
            'query' => $city,
            'client_id' => $apiKey,
        ]);

        // Si la requête échoue, on retourne un tableau vide
        if ($response->failed()) {
            return []; // Tableau vide
        }

        // Convertir directement la réponse JSON en tableau PHP
        $data = $response->json();

        
        if (empty($data['results'])) {
            return [];
        }

        // Retourner le tableau des résultats
        return [
            'city' => $city,
            'image_url' => $data['results'][0]['urls']['regular'],
        ];
    }
}
