<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client; // Add this import statement

class EquipeController extends Controller
{
    public function equipeApi(Request $request)
    {
        $client = new Client();
    
        $id_equipe = $request->id_equipe;
        $id_saison = $request->id_saison;
        // Faites l'appel à l'API
        $response = $client->get("https://api.statorium.com/api/v1/teams/{$id_equipe}/?season_id={$id_saison}&apikey=12238dbb87bf7233b8ab70b36192a3ec");
    
        // Obtenez le corps de la réponse (contenu de l'API)
        $data = $response->getBody()->getContents();
    
        // Convertissez les données JSON en tableau (si nécessaire)
        $dataArray = json_decode($data, true);

            

        return response()->json([
            'status_code' => 200, 
            'success' => true,
            'message' => 'Liste des equipes',
            'items' => $dataArray,
        ]);
    }
}
