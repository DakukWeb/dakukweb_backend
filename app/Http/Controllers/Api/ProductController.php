<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());

            if ($user->hasRole('admin')) {
                return view('admin.products.index');
            }
        }
        return view('customer.products.index');
    }


    public function create()
    {
        $products = Product::all();
        return view('admin.products.create', ['products' => $products]);
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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();

        return view('admin.products.index', ['products' => $products]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return to_route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product->trashed()) {
            Product::find($id)->delete();
            $status = 'Producto eliminado exitosamente';
        } else {
            $status = 'No se puede borrar un producto ya eliminado o inexistente';
        }
        return to_route('products.index')->with('status', $status);
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->trashed()) {
            $product->restore();
            $status = 'Producto restaurado exitosamente';
        } else {
            $status = 'No se puede restaurar un producto activo o inexistente';
        }

        return to_route('products.index')->with('status', $status);
    }

    function store(Request $req)
    {
        $request->validate(ValidationRules::productRules());

        $product = new Product;

        $product->name=$req->name;
        $product->description=$req->description;
        $product->price=$req->price;
        $product->stock=$req->stock;
        $product->image=$req->image;

        $result = $product->save();
        if ($result)
        {
            return ["Result" => "Data has been stored"];
        }else{
            return["Result"=> "Problem with the data"];
        }
    }
}
