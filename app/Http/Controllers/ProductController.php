<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryChild;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $color    = $request->cookie("theme");
        $products = Product::all();
        $count    = Product::count();
        $num      = 1;
        return view("admin.products.all",compact("color","products","count","num"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $color      = $request->cookie("theme");
        $categories = CategoryChild::all();
        return view("admin.Products.create",compact("color","categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $data = $request->validate([
            "name"        =>"required|string|min:3|max:50",
            "description" =>"required",
            "smallDesc"   =>"required|max:255",
            "price"       =>"required|numeric",
            "offerPrice"  =>"numeric",
            "image1"      =>"required|image|mimes:png,jpg,jpeg",
            "image2"      =>"image|mimes:png,jpg,jpeg",
            "image3"      =>"image|mimes:png,jpg,jpeg",
            "quantity"    =>"required|integer",
            "category_id" =>"required|exists:category_children,id"
        ]);

        // Storage Images
        $data['image1'] = Storage::putFile("Products",$data['image1']);
        if ($request->has("image2")) {
            $data['image2'] = Storage::putFile("Products",$data['image2']);
        }
        if($request->has("image3")){
            $data['image3'] = Storage::putFile("Products",$data['image3']);
        }

        Product::create($data);
        return redirect(url("adminAddProduct"))->with("success","$name Created Successfully");
    }

    public function show(string $id,Request $request)
    {
        $color    = $request->cookie("theme");
        $product = Product::findOrFail($id);
        return view("admin.Products.show",compact("color","product"));
    }

    public function edit(string $id,Request $request)
    {
        $color    = $request->cookie("theme");
        $product  = Product::findOrFail($id);
        $categories = CategoryChild::all();
        return view("admin.Products.edit",compact("color","product","categories"));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "name"        =>"required|string|min:3|max:50",
            "description" =>"required",
            "smallDesc"   =>"required|max:255",
            "price"       =>"required|numeric",
            "offerPrice"  =>"numeric",
            "image1"      =>"image|mimes:png,jpg,jpeg",
            "image2"      =>"image|mimes:png,jpg,jpeg",
            "image3"      =>"image|mimes:png,jpg,jpeg",
            "quantity"    =>"required|integer",
            "category_id" =>"required|exists:category_children,id"
        ]);
        $product = Product::findOrFail($id);
        if($request->has("image1")) {
            Storage::delete($product->image1);
            $data['image1'] = Storage::putFile("Products",$data['image1']);
        }
        if($request->has("image2")){
            Storage::delete($product->image2);
            $data['image2'] = Storage::putFile("Products",$data['image2']);
        }
        if($request->has("image3")){
            Storage::delete($product->image3);
            $data['image3'] = Storage::putFile("Products",$data['image3']);
        }
        $product->update($data);
        return redirect(url("adminShowProduct/$id"))->with("success","Update Successfully");
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect(url("products"))->with("success","Deleted Successfully");
    }
}
