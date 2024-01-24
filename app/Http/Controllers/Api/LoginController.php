<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Http\Resources\UserResource;
use Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            Helper::sendError('email or passowoed wrong');
        }
        return new UserResource(auth()->user());
    }
}
