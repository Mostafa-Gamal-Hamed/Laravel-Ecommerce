<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryChild;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request) {
        if(Auth::user()->role == 1) {
            $color           = $request->cookie("theme");
            $categories      = Category::paginate(5);
            $categoriesChild = CategoryChild::paginate(5);
            $products        = Product::paginate(5);
            $orders          = Order::paginate(5);
            $cate_count      = Category::count();
            $child_count     = CategoryChild::count();
            $prod_count      = Product::count();
            $order_count     = Order::count();
            return view("admin.home",compact("color","categories","categoriesChild","products","orders",
                "cate_count","child_count","prod_count","order_count"));
        }else{
            $products    = Product::inRandomOrder()->paginate(6);
            $categories = CategoryChild::paginate(8);
            return view("user.home",compact("products","categories"));
        }
    }

    public function color(Request $request) {
        $color = $request->theme;
        if($color && in_array($color,["light","dark"])){
            $cookie = cookie("theme",$color);
        }
        return redirect()->back()->withCookie($cookie);
    }
}
