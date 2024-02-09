<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

class UserController extends Controller
{
    // Retrieves all users and returns them as a collection
    public function index()
    {
        return new UserCollection(User::all()->keyBy->id);
    }
    // Stores a new user using data from the request
    public function store(StoreUserRequest $request)
    {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);
            // Assigns the 'customer' role to the newly created user
        $user->assignRole('customer');
        return ["Result" => "Data has been stored"];
    }
    // Retrieves and returns a specific user by its ID
    public function show($id)
    {
        return new UserResource(User::find($id));
    }
    // Updates an existing user with data from the request
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return ["Result" => "Data has been updated"];
    }
    // Deletes a user by its ID and handles self-deletion and soft deletion if applicable
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->id == auth()->id()) {
            $alert = 'Error';
            $message = 'You cannot delete yourself';
        } else if (!$user->trashed()) {
            $alert = 'Result';
            User::find($id)->delete();
            $message = 'Data has been deleted';
        }
        return ["$alert" => "$message"];
    }
    // Restores a soft-deleted user by its ID
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return ["Result"=>"Data has been restored"];
    }
}
