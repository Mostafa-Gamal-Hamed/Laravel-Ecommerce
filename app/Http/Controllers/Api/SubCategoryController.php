<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\CategoryChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryChild::all();
        return SubCategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = CategoryChild::find($id);
        if($category == null) {
            return response()->json(["Error"=>"Category Not Found"],404);
        }
        return new SubCategoryResource($category);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name"=>"required|string|min:3",
            "image"=>"required|image|mimes:png,jpg,jpeg",
            "category_id"=>"required|exists:categories,id",
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        $request->image = Storage::putFile("CategoryChild",$request->image);
        CategoryChild::create([
            "name"=>$request->name,
            "image"=>$request->image,
            "category_id"=>$request->category_id,
        ]);

        return response()->json(["Success"=>"Category add successfully"]);
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            "name"=>"required|string|min:3",
            "image"=>"image|mimes:png,jpg,jpeg",
            "category_id"=>"required|exists:categories,id"
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        // check id
        $category = CategoryChild::find($id);
        if($category == null) {
            return response()->json(["Wrong"=>"category Not Found"],404);
        }

        // check if there is image or not
        $image = $category->image;
        if($request->has("image")) {
            Storage::delete($image);
            $image = Storage::putFile("CategoryChild",$request->image);
        }

        // Update
        $category->update([
            "name"=>$request->name,
            "image"=>$image,
            "category_id"=>$request->category_id,
        ]);

        return response()->json([
            "Success"=>"Category Updated Successfully",
            "category"=> new SubCategoryResource($category)
        ],201);
    }

    public function destroy($id)
    {
        $category = CategoryChild::find($id);
        if($category == null) {
            return response()->json(["Wrong"=>"category Not Found"],404);
        }

        // Delete image
        if($category->image != null) {
            Storage::delete($category->image);
        }

        // Delete
        $category->delete();
        return response()->json(["Success"=>"Category Deleted Successfully"],201);
    }
}
