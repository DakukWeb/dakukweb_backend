<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Store\StoreCategoryRequest;
use App\Http\Requests\Api\Update\UpdateCategoryRequest;
use App\Http\Resources\Api\CategoryCollection;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
  // Retrieves all categories and returns them as a collection
    public function index()
    {
        $category = Category::query();

        if (Auth::check()) {
            // If the user is an admin, include soft deleted products
            $category = $category->withTrashed();
        }

        $category = $category->get();
        return new CategoryCollection($category);
    }
  // Retrieves and returns a specific category by its ID
    public function show($id)
    {
        return new CategoryCollection([Category::findOrFail($id)]);
    }
  // Stores a new category using data from the request
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return ["Result" => "Data has been stored", "data" => $category];
    }
  // Updates an existing category with data from the request
    public function update(UpdateCategoryRequest $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->update($request->all());
        return ["Result" => "Data has been updated", "data" => $categories];
    }
  // Deletes a category by its ID and handles soft deletion if applicable
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Category::findOrFail($id)->delete();
        return ["Result"=>"Data has been deleted", "data" => $category];
    }
  // Restores a soft-deleted category by its ID
    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return ["Result"=>"Data has been restored", "data" => $category];
    }
}
