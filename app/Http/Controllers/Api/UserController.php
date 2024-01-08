<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogUserRequest;
use App\Http\Requests\RegisterUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function register(RegisterUser $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password, [
                'rounds' => 12,
            ]);

            $user->save();
            return response()->json([
                'status_code' => 201,
                'message' => 'Utilisateur créé avec succès',
                'user' => $user,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function login(LogUserRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            $user = auth()->user();
            $token = $user->createToken('TOKEN_VISIBLE8BACK')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'message' => 'Utilisateur connecté avec succès',
                'user' => $user,
                'access_token' => $token,
            ]);
        } else {
            return response()->json([
                'status_code' => 401,
                'message' => 'Informations de connexion invalides',
            ]);
        }
    }
}
