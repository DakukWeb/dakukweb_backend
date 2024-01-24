<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function index()
    {
        return User::withoutGlobalScopes()->get();
    }

    /*
        Store
    */
    function store(Request $req)
    {
        $user = new User;

        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->phone=$req->phone;
        $result =  $user->save();
        if($result)
        {
            return ["Result" => "Data has been stored"];
        }else{
            return["Result"=> "Problem with the data"];
        }
    }
}
