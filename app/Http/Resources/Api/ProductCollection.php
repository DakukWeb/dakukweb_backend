<?php

namespace App\Http\Resources\Api;

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
        return [
            'data' => [
                $this->collection->count(),
                $this->collection,
                /*$this->collection->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'price' => $product->price,
                        'stock' => $product->stock,
                        'image' => $product->image,
                        'deleted_at' => $product->trashed(), // Indicate if the product is soft deleted
                    ];
                }),*/
            ],
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
