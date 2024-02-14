<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StoreOrderRequest;
use App\Http\Requests\Api\Update\UpdateOrderRequest;
use App\Http\Resources\Api\OrderCollection;
use Illuminate\Support\Facades\Auth;

// Controller for managing orders
class OrderController extends Controller
{
    // Retrieves all orders and returns them as a collection
    public function index()
    {
        $orders = Order::query();
        if (Auth::check()) {
            // If the user is an admin, include soft deleted orders
            $orders = $orders->withTrashed();
        }
        $orders = $orders->get();
        return new OrderCollection($orders);
    }
    // Retrieves and returns a specific product by its ID
    public function show($id)
    {
        return new OrderCollection([Order::findOrFail($id)]);
    }
    // Stores a new order using data from the request
    public function store(StoreOrderRequest $request)
    {
        $orders = Order::create([
            'comments' => $request->comments,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);
        return ["Result"=>"Data has been stored", "data" => $orders];
    }
    // Updates an existing order with data from the request
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return ["Result" => "Data has been updated", "data" => $order];
    }
    // Deletes an order by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        Order::findOrFail($id)->delete();
        return ["Result"=>"Data has been deleted", "data" => $order];
    }
    // Restores a soft-deleted order by its ID
    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        $order->restore();
        return ["Result"=>"Data has been restored", "data" => $order];
    }
}
