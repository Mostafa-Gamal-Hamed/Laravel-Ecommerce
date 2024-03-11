<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product == null) {
            return response()->json(["Error"=>"Product Not Found"],404);
        }
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name"        =>"required|string|min:3|max:50",
            "description" =>"required",
            "smallDesc"   =>"required|max:255",
            "price"       =>"required|numeric",
            "offerPrice"  =>"numeric",
            "image"       =>"required|image|mimes:png,jpg,jpeg",
            "quantity"    =>"required|integer",
            "category_id" =>"required|exists:category_children,id"
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        $request->image = Storage::putFile("Products",$request->image);
        Product::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "smallDesc"=>$request->smallDesc,
            "price"=>$request->price,
            "offerPrice"=>$request->offerPrice,
            "image"=>$request->image,
            "quantity"=>$request->quantity,
            "category_id"=>$request->category_id,
        ]);

        return response()->json(["Success"=>"Product add successfully"]);
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            "name"        =>"required|string|min:3|max:50",
            "description" =>"required",
            "smallDesc"   =>"required|max:255",
            "price"       =>"required|numeric",
            "offerPrice"  =>"numeric",
            "image"       =>"image|mimes:png,jpg,jpeg",
            "quantity"    =>"required|integer",
            "category_id" =>"required|exists:category_children,id"
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        // check id
        $product = Product::find($id);
        if($product == null) {
            return response()->json(["Wrong"=>"Product Not Found"],404);
        }

        // check if there is image or not
        $image = $product->image;
        if($request->has("image")) {
            Storage::delete($image);
            $image = Storage::putFile("Products",$request->image);
        }

        // Update
        $product->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "smallDesc"=>$request->smallDesc,
            "price"=>$request->price,
            "offerPrice"=>$request->offerPrice,
            "image"=>$request->image,
            "quantity"=>$request->quantity,
            "category_id"=>$request->category_id,
        ]);

        return response()->json([
            "Success"=>"Product Updated Successfully",
            "category"=> new ProductResource($product)
        ],201);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product == null) {
            return response()->json(["Wrong"=>"Product Not Found"],404);
        }

        // Delete image
        if($product->image != null) {
            Storage::delete($product->image);
        }

        // Delete
        $product->delete();
        return response()->json(["Success"=>"Product Deleted Successfully"],201);
    }
}
