<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return CityResource::collection($cities);
    }

    public function show($id)
    {
        $city = City::find($id);
        if($city == null) {
            return response()->json(["Error"=>"City Not Found"],404);
        }
        return new CityResource($city);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name"=>"required|string|min:3"
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        // Check if Exist
        $city = City::where("name",$request->name);
        if($city->count() != 0) {
            return response()->json(["Error"=>"City Is Exist"],404);
        }

        City::create(["name"=>$request->name]);
        return response()->json(["Success"=>"Category add successfully"]);
    }

    public function update(Request $request,$id)
    {
        $validate = Validator::make($request->all(),[
            "name"=>"required|string|min:3"
        ]);
        if($validate->fails()) {
            return response()->json(["Error"=>$validate->errors()],403);
        }

        // check id and name
        $city = City::find($id);
        if($city == null) {
            return response()->json(["Wrong"=>"City Not Found"],404);
        }

        $name = City::where("name",$request->name);
        if($name->count() > 0) {
            return response()->json(["Wrong"=>"City Is Exist"],404);
        }

        // Update
        $city->update([
            "name"=>$request->name
        ]);

        return response()->json([
            "Success"=>"City Updated Successfully",
            "City"=> new CityResource($city)
        ],201);
    }

    public function destroy($id)
    {
        $city = City::find($id);
        if($city == null) {
            return response()->json(["Wrong"=>"City Not Found"],404);
        }

        // Delete
        $city->delete();
        return response()->json(["Success"=>"City Deleted Successfully"],201);
    }
}
