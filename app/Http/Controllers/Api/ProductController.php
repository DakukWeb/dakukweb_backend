<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        return new ProductCollection(Product::all()->keyBy->id);
    }

    public function show(Product $product)
    {
        if ($product) {
            return response()->json(['data' => $product], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
        /*if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasRole('admin')) {
                return view('admin.products.show', ['product' => $product]);
            }
        }
        return view('customer.products.show', ['product' => $product]);*/
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return ["Result" => "Data has been updated"];
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product->trashed()) {
            Product::find($id)->delete();
            $status = 'Success';
            $message = 'Data has been deleted';
        } else {
            $status = 'Error';
            $message = 'You can not delete an non-existent product';
        }
        return ["$status" => "$message"];
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->trashed()) {
            $product->restore();
            $alert = 'Success';
            $message = 'Data has been restored';
        } else {
            $alert = 'Error';
            $message = 'You can not restored an non-existent product';
        }

        return ["$alert"=>"$message"];
    }

    function store(StoreProductRequest $request) //falta categoria
    {
        //$request->validate(ValidationRules::productRules());
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
        ]);
         return ["Result" => "Data has been stored"];
    }
}
