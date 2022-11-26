<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(){
        return response()->json(Product::all(), 200);
    }

    public function getProduct($id){
        $product = Product::find($id);
        if(is_null($product))
            return response()->json(['message'=>'Product Not Found'], 404);
        else
            return response()->json($product, 200);
    }

    public function addProduct(Request $request){
        $product = Product::create($request->all());
        return response()->json($product, 200);
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        if(is_null($product))
            return response()->json(['message'=>'Product Not Found'], 404);
        else{
            $product->update($request->all());
            return response()->json($product, 200);
        }
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        if(is_null($product))
            return response()->json(['message'=>'Product Not Found'], 404);
        else{
            $product->delete();
            return response()->json(null, 204);
        }
    }
}