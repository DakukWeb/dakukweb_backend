<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return new UserCollection(User::all()->keyBy->id);
    }

    /*
        Store
    */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
         $user->assignRole('customer');
         return ["Result" => "Data has been stored"];
    }

    public function show($id)
    {
        return new UserResource(User::find($id));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return ["Result" => "Data has been updated"];
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id == auth()->id()){
            $alert = 'Error';
            $message = 'You can not delete yourself';
        }
        else if(!$user->trashed()){
            $alert = 'Success';
            User::find($id)->delete();
            $message = 'Data has been deleted';
        }
        else{
            $alert = 'Error';
            $message = 'You can not delete an non-existent user';
        }
        return ["$alert" => "$message"];
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if($user->trashed()){
            $user->restore();
            $alert = 'Success';
            $message = 'Data has been restored';
        }
        else{
            $alert = 'Error';
            $message = 'You can not restored an non-existent user';
        }

        return ["$alert"=>"$message"];
    }
}
