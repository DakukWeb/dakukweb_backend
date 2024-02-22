<?php

namespace App\Http\Resources\Api;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        $users = $this->collection;
        $users = User::withTrashed()->whereIn('id', $users->pluck('id'))->get();
        return [
            'data' => [
                $users->map(function($user){
                    return[
                        'id' => $user->id,
                        'old_id' => $user->old_id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone,
                        'email_verified_at' => $user->email_verified_at,
                        "created_at" => $user->created_at,
                        "updated_at" => $user->updated_at,
                        "deleted_at" => $user->deleted_at
                    ];
                }),
            ],
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
