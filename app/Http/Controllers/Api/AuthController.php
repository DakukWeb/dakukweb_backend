<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Api\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            return ["Result" => "email or passowoed wrong"];
        }
        return new UserResource(auth()->user());
    }
    public function logout()
    {
        $user = Auth::user();
        // Revocar todos los tokens de acceso del usuario
        $user->tokens()->delete();
        return ["Result" => "User logged out", "data" => $user];
    }
}

