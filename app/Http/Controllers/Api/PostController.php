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
        $perPage = 1;
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

   public function update(EditPostRequest $request,Post  $post)
   {

    // on modifie un post
        try{
            $post->titre = $request->titre;
            $post->description = $request->description;
            $post->save();
            return response()->json([
                'status_code' => 200, 
                'success' => true,
                'message' => 'Post modifié ',
                'data' => $post,
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }

   }

   public function destroy(Post $post)
   {

    // on supprime un post
        try{
            if($post){
                
            $post->delete();
            return response()->json([
                'status_code' => 200, 
                'success' => true,
                'message' => 'Post supprimé ',
                'data' => $post,
            ]);
        }
        else{
            
            return response()->json([
                'status_code' => 422, 
                'message' => 'Post non trouvé ',
            ]);
        }
        }
        catch(Exception $e){
            return response()->json($e);
        }
   }
}