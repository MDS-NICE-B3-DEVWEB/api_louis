<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception; // Add the import statement for the Exception class

class PostController extends Controller
{
   public function index(Request $request)
   {
       try {
           $query = Post::query();
           $perPage = 3;
           $page = $request->input('page', 1); 
           $search = $request->input('search');
    
           if ($search) {
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
       } catch (Exception $e) {
           return response()->json([
               'status_code' => 500,
               'message' => 'Erreur lors de la récupération des posts.',
               'error' => $e->getMessage(),
           ]);
       }
   }

   public function store(CreatePostRequest $request)
   {
       try {
           $post = new Post();  
           $post->titre = $request->titre;
           $post->description = $request->description;
           $post->user_id = auth()->user()->id;
           $post->save();
  
           return response()->json([
               'status_code' => 201, 
               'success' => true,
               'message' => 'Post créé avec succès',
               'data' => $post,
           ]);
       } catch (Exception $e) {
           return response()->json([
               'status_code' => 500,
               'message' => 'Erreur lors de la création du post.',
               'error' => $e->getMessage(),
           ]);
       }
   }

   public function update(EditPostRequest $request, Post $post)
   {
       if (auth()->check()) {
           $user = auth()->user();

           if ($user->id === $post->user_id) {
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
               return response()->json([
                   'status_code' => 403,
                   'message' => 'Vous n\'êtes pas autorisé à modifier ce post.',
               ]);
           }
       } else {
           return response()->json([
               'status_code' => 401,
               'message' => 'Vous devez être connecté pour modifier un post.',
           ]);
       }
   }

   public function destroy(Post $post)
   {
       if (auth()->check()) {
           $user = auth()->user();

           if ($user->id === $post->user_id) {
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
               return response()->json([
                   'status_code' => 403,
                   'message' => 'Vous n\'êtes pas autorisé à supprimer ce post.',
               ]);
           }
       } else {
           return response()->json([
               'status_code' => 401,
               'message' => 'Vous devez être connecté pour supprimer un post.',
           ]);
       }
   }
}