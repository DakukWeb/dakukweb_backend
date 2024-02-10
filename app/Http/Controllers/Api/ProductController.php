<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
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
    public function show($id)
    {
            $product = Product::findOrFail($id);
            return response()->json(['data' => $product], 200);
    }
    // Updates an existing product with data from the request
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return ["Result" => "Data has been updated", "data" => $product];
    }
    // Deletes a product by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Product::find($id)->delete();
        return ["Result" => "Data has been deleted", "data" => $product];
    }
    // Restores a soft-deleted product by its ID
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return ["Result"=>"Data has been restored", "data" => $product];
    }
    // Stores a new product using data from the request
    function store(StoreProductRequest $request) // Assuming category information is missing
    {
        /*
        $imageName = time() . '-' . $request->name . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        */
        // Validation commented out, assuming it's done in a separate class
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
        ]);
        return ["Result" => "Data has been stored", "data" => $product];
    }
}
