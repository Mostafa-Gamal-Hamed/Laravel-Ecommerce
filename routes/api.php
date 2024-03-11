<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SubCategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category
Route::controller(CategoryController::class)->group(function() {
    Route::get("categories","index");
    Route::get("category/{id}","show");
    Route::post("addCategory","store");
    Route::put("category/{id}","update");
    Route::delete("category/{id}","destroy");
});

// SubCategory
Route::controller(SubCategoryController::class)->group(function() {
    Route::get("subCategories","index");
    Route::get("subCategory/{id}","show");
    Route::post("addSubcategory","store");
    Route::put("subCategory/{id}","update");
    Route::delete("subCategory/{id}","destroy");
});

// Product
Route::controller(ProductController::class)->group(function() {
    Route::get("product","index");
    Route::get("product/{id}","show");
    Route::post("addProduct","store");
    Route::put("product/{id}","update");
    Route::delete("product/{id}","destroy");
});

// City
Route::controller(CityController::class)->group(function() {
    Route::get("city","index");
    Route::get("city/{id}","show");
    Route::post("addCity","store");
    Route::put("city/{id}","update");
    Route::delete("city/{id}","destroy");
});