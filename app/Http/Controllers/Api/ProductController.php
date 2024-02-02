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
    // Retrieves all products and returns them as a collection
    public function index()
    {
        return new ProductCollection(Product::all()->keyBy->id);
    }

    // Retrieves and returns a specific product by its ID
    public function show(Product $product)
    {
        if ($product) {
            return response()->json(['data' => $product], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    // Updates an existing product with data from the request
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return ["Result" => "Data has been updated"];
    }

    // Deletes a product by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product->trashed()) {
            Product::find($id)->delete();
            $status = 'Success';
            $message = 'Data has been deleted';
        } else {
            $status = 'Error';
            $message = 'You cannot delete a non-existent product';
        }
        return ["$status" => "$message"];
    }

    // Restores a soft-deleted product by its ID
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->trashed()) {
            $product->restore();
            $alert = 'Success';
            $message = 'Data has been restored';
        } else {
            $alert = 'Error';
            $message = 'You cannot restore a non-existent product';
        }

        return ["$alert"=>"$message"];
    }

    // Stores a new product using data from the request
    function store(StoreProductRequest $request) // Assuming category information is missing
    {
        // Validation commented out, assuming it's done in a separate class
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
