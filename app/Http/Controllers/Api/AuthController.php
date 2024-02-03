<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            Helper::sendError('email or passowoed wrong');
        }
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        $user = Auth::user();
        // Revocar todos los tokens de acceso del usuario
        $user->tokens()->delete();
        return ["Result" => "User logged out"];
    }
}

