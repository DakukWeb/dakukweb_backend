<?php

namespace App\Http\Resources\Api;

use App\Models\Order;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        $orders = $this->collection;
        $orders = Order::withTrashed()->whereIn('id', $orders->pluck('id'))->get();
        return [
            'data' => [
                $orders->map(function($order){
                    return[
                        'id' => $order->id,
                        'user_id' => $order->user_id,
                        'status' => $order->status,
                        'comments' => $order->comments,
                        "created_at" => $order->created_at,
                        "updated_at" => $order->updated_at,
                        "deleted_at" => $order->deleted_at
                    ];
                }),
            ],
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
