<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;

// Controller for managing orders
class OrderController extends Controller
{
    // Retrieves all orders and returns them as a collection
    public function index()
    {
        return new OrderCollection(Order::all()->keyBy->id);
    }
    // Retrieves and returns a specific product by its ID
    public function show($id)
    {
            $order = Order::findOrFail($id);
            return response()->json(['data' => $order], 200);
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
        $order = Order::find($id)->delete();
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
