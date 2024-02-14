<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderDetails;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StoreOrderDetailsRequest;
use App\Http\Requests\Api\Update\UpdateOrderDetailsRequest;
use App\Http\Resources\Api\OrderDetailsCollection;

// Controller for managing OrderDetails
class OrderDetailsController extends Controller
{
    // Retrieves all OrderDetails and returns them as a collection
    public function index()
    {
        return new OrderDetailsCollection(OrderDetails::all()->keyBy->id);
    }
    // Retrieves and returns a specific product by its ID
    public function show($id)
    {
        return new OrderDetailsCollection([OrderDetails::findOrFail($id)]);
    }
    // Stores a new OrderDetails using data from the request
    public function store(StoreOrderDetailsRequest $request)
    {
        $OrderDetails = OrderDetails::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
        ]);
        return ["Result"=>"Data has been stored", "data" => $OrderDetails];
    }
    // Updates an existing OrderDetails with data from the request
    public function update(UpdateOrderDetailsRequest $request, $id)
    {
        $OrderDetails = OrderDetails::findOrFail($id);
        $OrderDetails->update($request->all());
        return ["Result" => "Data has been updated", "data" => $OrderDetails];
    }
    // Deletes an OrderDetails by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $OrderDetails = OrderDetails::findOrFail($id);
        OrderDetails::findOrFail($id)->delete();
        return ["Result"=>"Data has been deleted", "data" => $OrderDetails];
    }
    // Restores a soft-deleted OrderDetails by its ID
    public function restore($id)
    {
        $OrderDetails = OrderDetails::withTrashed()->find($id);
        $OrderDetails->restore();
        return ["Result"=>"Data has been restored", "data" => $OrderDetails];
    }
}
