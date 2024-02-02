<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
  // Retrieves all categories and returns them as a collection
  public function index()
  {
        return new CategoryCollection(Category::all()->keyBy->id);
  }

  // Retrieves and returns a specific category by its ID
  public function show(Category $category)
  {
    if ($category) {
        return response()->json(['data' => $category], 200);
    } else {
        return response()->json(['message' => 'Category not found'], 404);
    }
  }

  // Stores a new category using data from the request
  public function store(StoreCategoryRequest $request)
  {
    $category = Category::create([
      'name' => $request->name,
      'category_id' => $request->category_id,
    ]);

    return ["Result" => "Data has been stored"];
  }

  // Updates an existing category with data from the request
  public function update(UpdateCategoryRequest $request, $id)
  {
    $categories = Category::findOrFail($id);
    $categories->update($request->all());
    return ["Result" => "Data has been updated"];
  }

  // Deletes a category by its ID and handles soft deletion if applicable
  public function destroy($id)
  {
    $category = Category::find($id);
    if (!$category->trashed()) {
      Category::find($id)->delete();
      $alert = 'Success';
      $message = 'Data has been deleted';
    } else {
        $alert = 'Error';
        $message = 'You cannot delete a non-existent category';
    }
    return ["$alert"=>"$message"];
  }

  // Restores a soft-deleted category by its ID
  public function restore($id)
  {
    $category = Category::withTrashed()->find($id);
    if ($category->trashed()) {
        $category->restore();
        $alert = 'Success';
        $message = 'Data has been restored';
    } else {
        $alert = 'Error';
        $message = 'You cannot restore a non-existent category';
    }

    return ["$alert"=>"$message"];
  }
}
