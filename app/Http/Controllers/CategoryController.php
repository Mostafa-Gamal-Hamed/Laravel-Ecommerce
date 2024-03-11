<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $color      = $request->cookie("theme");
        $categories = Category::all();
        $num = 1;
        return view("admin.Categories.all",compact("color","categories","num"));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "image"=>"required|image|mimes:png,jpg,jpeg"
        ]);
        $data['image'] = Storage::putFile("Categories",$data['image']);
        Category::create($data);
        return redirect(url("adminCategories"))->with("success","$name Created Successfully");
    }

    public function edit(string $id , Request $request)
    {
        $color    = $request->cookie("theme");
        $category = Category::findOrFail($id);
        return view("admin.Categories.edit",compact("color","category"));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "image"=>"image|mimes:png,jpg,jpeg"
        ]);
        $category = Category::findOrFail($id);
        if($request->has("image")) {
            Storage::delete($category->image);
            $data['image'] = Storage::putFile("Categories",$data['image']);
        }
        $category->update($data);
        return redirect(url("adminCategories"))->with("success","Edit Successfully");
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Storage::delete($category->image);
        $category->delete();
        return redirect(url("adminCategories"))->with("success","$category->name Deleted Successfully");
    }
}
