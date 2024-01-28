<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return User::withoutGlobalScopes()->get();
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

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return to_route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id == auth()->id()){
            $alert = 'error';
            $message = 'No puedes eliminar tu propio usuario.';
        }
        else if(!$user->trashed()){
            $alert = 'success';
            User::find($id)->delete();
            $message = 'Usuario eliminado exitosamente';
        }
        else{
            $alert = 'error';
            $message = 'No se puede borrar un usuario ya eliminado o inexistente';
        }
        return to_route('users.index')->with(['alert' => $alert, 'message' => $message]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if($user->trashed()){
            $user->restore();
            $status = 'Usuario restaurado exitosamente';
        }
        else{
            $status = 'No se puede restaurar un usuario activo o inexistente';
        }

        return to_route('users.index')->with('status', $status);
    }
}
