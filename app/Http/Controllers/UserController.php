<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request) {
        $color      = $request->cookie("theme");
        $users      = User::all();
        $num        = 1;
        $adminCount = User::where("role","1")->count();
        $userCount  = User::where("role","0")->count();
        return view("admin.Users.all",compact("color","users","num","adminCount","userCount"));
    }

    public function makeAdmin($id) {
        User::where("id","=","$id")->update(["role"=>"1"]);
        return redirect(url("users"))->with("success","Change To Admin Successfully");
    }

    public function makeUser($id) {
        User::where("id","=","$id")->update(["role"=>"0"]);
        return redirect(url("users"))->with("success","Change To User Successfully");
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(url("users"))->with("success","$user->name Deleted Successfully");
    }
}
