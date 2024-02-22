<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductCollection;
use App\Http\Requests\Api\Store\StoreProductRequest;
use App\Http\Requests\Api\Update\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductController extends Controller
{
    // Retrieves all products and returns them as a collection
    public function index()
    {
        /*
            /esto servira si queres separar datos por paginas
        return new ProductCollection($products->paginate(10));
        */
        return new ProductCollection(Product::all());
    }
    // Retrieves and returns a specific product by its ID
    public function show($id)
    {
            return new ProductCollection([Product::findOrFail($id)]);
    }
    // Retrieves and returns similar products by their name
    public function search(UpdateProductRequest $request)
    {
        $products = Product::query();
        //  If the user is an admin, include soft deleted products
        if (Auth::check()) {
            $products->withTrashed();
        }
        // Filter by name (optional)
        if ($request->has('name')){
            $products->where('name', 'like', "%$request->name%");
        }
        // Filter by stock (optional)
        if ($request->has('stock')) {
            $products->where('stock', '<=', $request->stock);
        }
        // Filter by price (optional)
        if ($request->has('price')) {
            $products->where('price','<=', $request->price);
        }
        $search = $products->get();
        if ($search->isEmpty()) {
            throw new NotFoundHttpException('No product with similar name');
        }
        return new ProductCollection(
            $search
        );
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
    function store(StoreProductRequest $request)
    {
        if(!$request->hasFile('image')) {
            throw new HttpException(400, 'upload_file_not_found');
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            throw new HttpException(400, 'upload_file_not_found');
        }
        $path = public_path() . '/uploads/images/store/';
        $imageName = $request->name . '.' .
        $request->image->extension();
        $file->move($path, $file->getClientOriginalName());
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);
        return ["Result" => "Data has been stored", "data" => $product];
    }
}
