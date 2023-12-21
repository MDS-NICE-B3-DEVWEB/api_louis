<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('posts', [PostController::class, 'index']);

// Route pour Modifier un post
Route::put('posts/{post}', [PostController::class, 'update']);

// Route pour supprimer un post
Route::delete('posts/{post}', [PostController::class, 'destroy']);

//Inscrire  un nouvelle utilisateur
Route::post('/register', [UserController::class, 'register']);

//Connexion d'un utilisateur
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    
    // retourne les infos de l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route pour créer un post
    Route::post('posts/create', [PostController::class, 'store']);
});
