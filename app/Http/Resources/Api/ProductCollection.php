<?php

namespace App\Http\Resources\Api;

use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        $products = $this->collection;
        if (auth()->user()) {
            $products = Product::withTrashed()->whereIn('id', $products->pluck('id'))->get();
        }
        return [
            'data' => [
                $products->count(),
                $products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'stock' => $product->stock,
                        'image' => $product->image,
                        "created_at" => $this->when(auth()->user(), $product->created_at),
                        "updated_at" => $this->when(auth()->user(), $product->updated_at),
                        "deleted_at" => $this->when(auth()->user(), $product->deleted_at)
                    ];
                }),
            ],
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
