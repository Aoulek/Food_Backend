<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
        return response()->json(Category::all(), 200);
    }

    public function getCategory($id){
        $category = Category::find($id);
        if(is_null($category))
            return response()->json(['message'=>'Category Not Found'], 404);
        else
            return response()->json($category, 200);
    }

    public function addCategory(Request $request){
        $category = Category::create($request->all());
        return response()->json($category, 200);
    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        if(is_null($category))
            return response()->json(['message'=>'Category Not Found'], 404);
        else{
            $category->update($request->all());
            return response()->json($category, 200);
        }
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if(is_null($category))
            return response()->json(['message'=>'Category Not Found'], 404);
        else{
            $category->delete();
            return response()->json(null, 204);
        }
    }
}