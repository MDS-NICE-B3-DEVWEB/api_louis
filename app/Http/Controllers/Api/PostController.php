<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{
   public function index(Request $request)
   {
    // on recupere les posts pour les afficher
       try{
        $query = Post::query();
        $perPage = 3;
        $page = $request->input('page', 1); 
        $search = $request->input('search');
    
        if($search){
            $query->whereRaw("titre LIKE '%" . $search . "%'");
        }
    
        $total = $query->count();
    
        $reultat = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        
        return response()->json([
            'status_code' => 200, 
            'success' => true,
            'message' => 'Liste des posts',
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
            'items' => $reultat,
        ]);
       }
       catch(Exception $e){
        return response()->json($e);
        }
       
   }

   public function store(CreatePostRequest $request)
   {
    // on crée un nouveau post
   
     try{
        $post =new Post();  
        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->save();
  
        return response()->json([
            'status_code' => 200, 
            'success' => true,
            'message' => 'Post créé avec succès',
            'data' => $post,
        ]);
     }
     
     catch(Exception $e){
        return response()->json($e);
        }
   }

   public function update(EditPostRequest $request, Post $post)
{
    // Vérifier si l'utilisateur est authentifié
    if (auth()->check()) {
        $user = auth()->user();

        // Vérifier si l'utilisateur est le propriétaire du post
        if ($user->id === $post->user_id) {
            // Modifier le post
            try {
                $post->titre = $request->titre;
                $post->description = $request->description;
                $post->save();

                return response()->json([
                    'status_code' => 200,
                    'success' => true,
                    'message' => 'Post modifié ',
                    'data' => $post,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Erreur lors de la modification du post.',
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            // L'utilisateur n'est pas le propriétaire du post
            return response()->json([
                'status_code' => 403,
                'message' => 'Vous n\'êtes pas autorisé à modifier ce post.',
            ]);
        }
    } else {
        // L'utilisateur n'est pas authentifié
        return response()->json([
            'status_code' => 401,
            'message' => 'Vous devez être connecté pour modifier un post.',
        ]);
    }
}


   public function destroy(Post $post)
{
    // Vérifier si l'utilisateur est authentifié
    if (auth()->check()) {
        $user = auth()->user();

        // Vérifier si l'utilisateur est le propriétaire du post
        if ($user->id === $post->user_id) {
            // Supprimer le post
            try {
                $post->delete();

                return response()->json([
                    'status_code' => 200,
                    'success' => true,
                    'message' => 'Post supprimé ',
                    'data' => $post,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Erreur lors de la suppression du post.',
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            // L'utilisateur n'est pas le propriétaire du post
            return response()->json([
                'status_code' => 403,
                'message' => 'Vous n\'êtes pas autorisé à supprimer ce post.',
            ]);
        }
    } else {
        // L'utilisateur n'est pas authentifié
        return response()->json([
            'status_code' => 401,
            'message' => 'Vous devez être connecté pour supprimer un post.',
        ]);
    }
}
}