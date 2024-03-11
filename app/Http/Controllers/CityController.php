<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $color  = $request->cookie("theme");
        $cities = City::all();
        $num    = 1;
        return view("admin.City.all",compact("color","cities","num"));
    }

    public function store(Request $request)
    {
        $data = $request->validate(["name"=>"required|string|min:3"]);

        // check if exist
        $city = City::where("name",$request->name);
        if($city->count() != 0) {
            return redirect(url("city"))->with("error","$request->name Is Exist");
        }
        City::create($data);
        return redirect(url("city"))->with("success","$request->name Created Successfully");
    }

    public function Edit(Request $request,$id)
    {
        $color = $request->cookie("theme");
        $city  = City::findOrFail($id);
        return view("admin.City.edit",compact("color","city"));
    }

    public function update(Request $request ,$id)
    {
        $data = $request->validate(["name"=>"required|string|min:3"]);
        $city = City::findOrFail($id);
        $city->update($data);
        return redirect(url("city"))->with("success","Updated Successfully");
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect(url("city"))->with("success","$city->name Deleted Successfully");
    }
}
