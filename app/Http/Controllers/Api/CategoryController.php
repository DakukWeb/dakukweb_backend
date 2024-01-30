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

  public function index()
  {
        return new CategoryCollection(Category::all()->keyBy->id);
  }

  public function show(Category $category)
  {
    if ($category) {
        return response()->json(['data' => $category], 200);
    } else {
        return response()->json(['message' => 'Category not found'], 404);
    }
  }

  public function store(StoreCategoryRequest $request)
  {
    //$request->validate(ValidationRules::categoryRules());

    $category = Category::create([
      'name' => $request->name,
      'category_id' => $request->category_id,
    ]);

    return ["Result" => "Data has been stored"];
}

  public function update(UpdateCategoryRequest $request, $id)
  {
    $categories = Category::findOrFail($id);
    $categories->update($request->all());
    return ["Result" => "Data has been updated"];
  }

  public function destroy($id)
  {
    $category = Category::find($id);
    if (!$category->trashed()) {
      Category::find($id)->delete();
      $alert = 'Success';
      $message = 'Data has been deleted';
    } else {
        $alert = 'Error';
        $message = 'You can not delete an non-existent user';
    }
    return ["$alert"=>"$message"];
  }

  public function restore($id)
  {
    $category = Category::withTrashed()->find($id);
    if ($category->trashed()) {
        $category->restore();
        $alert = 'Success';
        $message = 'Data has been restored';
    } else {
        $alert = 'Error';
        $message = 'You can not restored an non-existent category';
    }

    return ["$alert"=>"$message"];
  }
}
