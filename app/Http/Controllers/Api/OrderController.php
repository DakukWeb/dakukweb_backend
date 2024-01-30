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

//ups
class OrderController extends Controller
{
    public function index()
    {
        return new OrderCollection(Order::all()->keyBy->id);
    }

    public function store(StoreOrderRequest $request)//falta
    {
        $orders = Order::create([
            'comments' => $request,
        ]);
        return ["Result"=>"Data has been stored"];
    }

    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return ["Result" => "Data has been updated"];
    }

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
            $message = 'You can not delete an non-existent order';
        }
        return ["$alert"=>"$message"];
    }

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
            $message = 'You can not restored an non-existent order';
        }

        return ["$alert"=>"$message"];
    }
}

