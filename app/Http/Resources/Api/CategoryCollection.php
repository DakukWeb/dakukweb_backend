<?php

namespace App\Http\Resources\Api;

use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        $categories = $this->collection;
        if (auth()->check()) {
            $categories = Category::withTrashed()->whereIn('id', $categories->pluck('id'))->get();
        }
        return [
            'data' => [
                $categories->map(function($category){
                    return[
                        'id' => $category->id,
                        'category_id' => $category->category_id,
                        'name' => $category->name,
                        "created_at" => $this->when(auth()->user(), $category->created_at),
                        "updated_at" => $this->when(auth()->user(), $category->updated_at),
                        "deleted_at" => $this->when(auth()->user(), $category->deleted_at)
                    ];
                }),
        ],
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
