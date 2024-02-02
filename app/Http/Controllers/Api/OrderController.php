<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
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

    // Stores a new order using data from the request
    public function store(StoreOrderRequest $request)
    {
        $orders = Order::create([
            'comments' => $request,
        ]);
        return ["Result"=>"Data has been stored"];
    }

    // Updates an existing order with data from the request
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return ["Result" => "Data has been updated"];
    }

    // Deletes an order by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $order = Order::find($id);
        if(!$order->trashed()){
            Order::find($id)->delete();
            $alert = 'Success';
            $message = 'Data has been deleted';
        }
        else{
            $alert = 'Error';
            $message = 'You cannot delete a non-existent order';
        }
        return ["$alert"=>"$message"];
    }

    // Restores a soft-deleted order by its ID
    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        if($order->trashed()){
            $order->restore();
            $alert = 'Success';
            $message = 'Data has been restored';
        }
        else{
            $alert = 'Error';
            $message = 'You cannot restore a non-existent order';
        }

        return ["$alert"=>"$message"];
    }
}
