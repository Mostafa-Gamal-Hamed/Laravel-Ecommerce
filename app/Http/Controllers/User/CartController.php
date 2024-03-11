<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request , $id) {
        if(Auth::user()){
            $cart = Cart::where("product_id",$id)->first();
            if($cart == null){
                $qty     = $request->quantity;
                $user    = Auth::user()->id;
                $product = Product::findOrFail($id);
                $request->validate([
                    "quantity"=>"required|integer"
                ]);
                Cart::create([
                    "name"=>$product->name,
                    "price"=>$product->price,
                    "offerPrice"=>$product->offerPrice,
                    "image"=>$product->image1,
                    "quantity"=>$qty,
                    "user_id"=>$user,
                    "product_id"=>$product->id
                ]);
                return redirect()->back()->with("success","Added Successfully");
            }else{
                $request->validate([
                    "quantity"=>"required|integer"
                ]);
                $oldQty = Cart::select("quantity")->where("product_id",$id)->get();
                $newQty = $request->quantity;
                Cart::where("product_id",$id)->update(["quantity"=>$newQty]);
                return redirect()->back()->with("success","Update Successfully");
            }
        }else{
            return redirect(url("login"));
        }
    }

    public function cart() {
        if(Auth::user()){
            $num   = 1;
            $user  = Auth::user()->id;
            $cart  = Cart::where("user_id",$user)->get();
            $count = Cart::where("user_id",$user)->count();
            $all   = Cart::where("user_id",$user)->get();
            return view("user.Cart.cart",compact("num","user","cart","count","all"));
        }else{
            return redirect(url("login"));
        }
    }

    public function removeFromCart($id) {
        $product = Cart::findOrFail($id);
        $product->delete();
        return redirect(url("cart"))->with("success","Removed Successfully");
    }

    public function removeAllCart() {
        $user = Auth::user()->id;
        Cart::where("user_id",$user)->delete();
        return redirect(url("cart"))->with("success","Removed All Successfully");
    }
}
