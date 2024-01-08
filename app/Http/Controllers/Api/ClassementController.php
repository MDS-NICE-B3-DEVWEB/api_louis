<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Response; // Import the Response class
class ClassementController extends Controller
{
    public function classementApi(Request $request)
    {
        $client = new Client();
    
        $id_saison = $request->id_saison;
        // Faites l'appel à l'API
        $response = $client->get("https://api.statorium.com/api/v1/seasons/{$id_saison}/?apikey=12238dbb87bf7233b8ab70b36192a3ec");
    
        // Obtenez le corps de la réponse (contenu de l'API)
        $data = $response->getBody()->getContents();
    
        // Convertissez les données JSON en tableau (si nécessaire)
        $dataArray = json_decode($data, true);

        // Assurez-vous que la clé 'participants' existe dans $dataArray
        if (isset($dataArray['season']['participants'])) {
            $equipes = [];

            // Parcourez tous les participants
            foreach ($dataArray['season']['participants'] as $participant) {
                $participantID = $participant['participantID'];
            
                // Faites un appel à l'API pour obtenir les détails de chaque équipe
                $response2 = $client->get("https://api.statorium.com/api/v1/teams/{$participantID}/?apikey=12238dbb87bf7233b8ab70b36192a3ec");
                
                // Obtenez le corps de la réponse (contenu de l'API)
                $data2 = $response2->getBody()->getContents();

                // Convertissez les données JSON en tableau (si nécessaire)
                $equipeData = json_decode($data2, true);

                // Vérifiez que la réponse a réussi
              
                    $equipes[] = [
                        'participantID' => $participantID,
                        'equipe' => $equipeData['team'],
                    ];
                
            }

            return response()->json([
                'status_code' => 200, 
                'success' => true,
                'message' => 'Liste des equipes',
                'items' => $equipes,
            ], 200); // Use the response helper function with the correct status code
        }

        return response()->json([
            'status_code' => 404, 
            'success' => false,
            'message' => 'Aucun participant trouvé',
            'items' => null,
        ], 404); // Use the response helper function with the correct status code
    }
}
