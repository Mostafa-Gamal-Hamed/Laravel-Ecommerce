<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryChild;
use App\Models\Order;
use App\Models\Product;
use App\Models\userOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /// categories ///
    public function categories($id) {
        $categories = Category::findOrFail($id);
        return view("user.Categories.all",compact("categories"));
    }
    public function showCategory(string $id) {
        $category = CategoryChild::where("id",$id)->get();
        return view("user.Categories.show",compact("category"));
    }
    public function categoryProducts($id) {
        $category = CategoryChild::where("id",$id)->get();
        $products = Product::where("category_id",$id)->get();
        return view("user.Categories.categoryProducts",compact("category","products"));
    }

    /// Products ///
    public function products() {
        $products = Product::inRandomOrder()->paginate(12);
        return view("user.Product.all",compact("products"));
    }
    public function showProduct(string $id) {
        $product = Product::findOrFail($id);
        return view("user.Product.show",compact("product"));
    }

    /// Search ///
    public function search(Request $request) {
        $key = $request->search;
        $products = Product::where("name","LIKE","%$key%")->paginate(12);
        return view("user.Product.all",compact("products"));
    }

    /// Make order ///
    public function makeOrder() {
        $user    = Auth::user()->id;
        $product = Cart::where("user_id",$user)->get();

        foreach ($product as $k => $v) {
            Order::create([
                "product_id"=>$v['product_id'],
                "quantity"=>$v['quantity'],
                "user_id"=>$user
            ]);
        }
        Cart::where("user_id",$user)->delete();
        return redirect(url("home"))->with("success","Confirm Successfully");
    }

    /// User profile ///
    public function cancelOrder($id) {
        Order::findOrFail($id);
        Order::where("id",$id)->update(["status"=>"canceled"]);
        return redirect()->back()->with("success","Order Canceled Successfully");
    }

    public function removeOrder($id) {
        $order = userOrders::findOrFail($id);
        $order->delete();
        return redirect()->back()->with("success","Order Removed Successfully");
    }

    /// Contact us ///
    public function contactUs() {
        return view('user.contact.contactUs');
    }

    public function contact(Request $request) {
        $request->validate([
            "name"=>"required|min:3",
            "email"=>"required|email",
            "subject"=>"required",
            "body"=>"required"
        ]);
        $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "body"=>$request->body
        ];
        Mail::to("mohaamedali04@gmail.com")->send(new SendMail($data));
        return redirect()->back()->with("success","Message Send Successfully");
    }
}
