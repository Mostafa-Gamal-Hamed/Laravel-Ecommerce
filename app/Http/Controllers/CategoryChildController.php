<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $color           = $request->cookie("theme");
        $categoriesChild = CategoryChild::all();
        $categories      = Category::all();
        $num = 1;
        return view("admin.CategoriesChild.all",compact("color","categoriesChild","categories","num"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "image"=>"required|image|mimes:png,jpg,jpeg",
            "category_id"=>"required|exists:categories,id"
        ]);
        $data['image'] = Storage::putFile("CategoryChild",$data['image']);
        CategoryChild::create($data);
        return redirect(url("adminCategoriesChild"))->with("success","$name Created Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Request $request)
    {
        $color    = $request->cookie("theme");
        $category = CategoryChild::findOrFail($id);
        $parent   = Category::all();
        return view("admin.CategoriesChild.edit",compact("color","category","parent"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "image"=>"image|mimes:png,jpg,jpeg",
            "category_id"=>"required|exists:categories,id"
        ]);
        $category = CategoryChild::findOrFail($id);
        if($request->has("image")) {
            Storage::delete($category->image);
            $data['image'] = Storage::putFile("CategoryChild",$data['image']);
        }
        $category->update($data);
        return redirect(url("adminCategoriesChild"))->with("success","Edit Successfully");
    }

    public function destroy(string $id)
    {
        $category = CategoryChild::findOrFail($id);
        Storage::delete($category->image);
        $category->delete();
        return redirect(url("adminCategoriesChild"))->with("success","$category->name Deleted Successfully");
    }
}
