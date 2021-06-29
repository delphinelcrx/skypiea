<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardControlleur extends Controller

{
    // Ici je récupère la liste des villes de la région Rhone Alpes pour les afficher dans le dashboard

    public function home()
    {
        
        $cities = "https://api.airvisual.com/v2/cities?state=Auvergne-Rh%C3%B4ne-Alpes&country=france&key=2cb6dd10-0354-496b-b1aa-64dbf8ad7012";

        $response = Http::get($cities);

        $cities = $response->json();

             
        return view('dashboard', [
            'cities' => $cities
        ]);
    }

    // Ici je passe le nom de la ville que j'ai récupéré  avec ma fonction home dans une variable param dans l'url pour recuperer les infos de ma ville dans une variable weather

    public function homeWithParam($param)
    {

        $url = "https://api.airvisual.com/v2/city?city=" . $param . "&state=Auvergne-Rh%C3%B4ne-Alpes&country=FRANCE&key=2cb6dd10-0354-496b-b1aa-64dbf8ad7012";

        $response = Http::get($url);

        $weather = $response->json();

        return view('dashboard-param' , [
            'param' => $param, 
            'weather' => $weather
        ]);
    }
}

