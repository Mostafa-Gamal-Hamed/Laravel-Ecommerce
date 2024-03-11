<?php

use App\Http\Controllers\CategoryChildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Http\Controllers\UserOrdersController;
use App\Models\CategoryChild;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;


/// Auth ///
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


/// Home ///
Route::get('home',[HomeController::class,'home']);

Route::middleware("guest")->group(function() {
    Route::get('/', function () {
        $products = Product::inRandomOrder()->paginate(6);
        $categories = CategoryChild::paginate(8);
        return view('user.home',compact("products","categories"));
    });
});


/// Admin Pages ///
Route::middleware("auth","IsAdmin")->group(function() {
    // Category
    Route::controller(CategoryController::class)->group(function() {
        // Show all categories
        Route::get("adminCategories","index");
        // Create category
        Route::post("adminCategory/store","store")->name("createCategory");
        // Edit category
        Route::get("adminEditCategory/{id}","edit");
        // Update category
        Route::put("adminCategory/update/{id}","update");
        // Delete category
        Route::delete("adminCategories/delete/{id}","destroy");
    });
    // Category child
    Route::controller(CategoryChildController::class)->group(function() {
        // Show all categories
        Route::get("adminCategoriesChild","index");
        // Create category
        Route::post("adminCategoryChild/store","store")->name("createCategoryChild");
        // Edit category
        Route::get("adminEditCategoriesChild/{id}","edit");
        // Update category
        Route::put("adminCategoriesChild/update/{id}","update");
        // Delete category
        Route::delete("adminCategoriesChild/delete/{id}","destroy");
    });
    // Product
    Route::controller(ProductController::class)->group(function() {
        // Show all products
        Route::get("adminProducts","index");
        // Show product
        Route::get("adminShowProduct/{id}","show");
        // Add product Page
        Route::get("adminAddProduct","create");
        // Create product
        Route::post("adminProduct/store","store")->name("createProduct");
        // Edit product page
        Route::get("adminEditProduct/{id}","edit");
        // Update product
        Route::put("adminUpdateProduct/{id}","update");
        // Delete product
        Route::delete("adminDeleteProduct/{id}","destroy");
    });
    // City
    Route::controller(CityController::class)->group(function() {
        // Show all
        Route::get("city","index");
        // Add city
        Route::post("createCity","store");
        // Edit city
        Route::get("editCity/{id}","Edit");
        // Update city
        Route::put("city/update/{id}","update");
        // Delete city
        Route::delete("city/delete/{id}","destroy");
    });
    // Users
    Route::controller(ControllersUserController::class)->group(function() {
        // Show all admins and users
        Route::get("users","index");
        // Make admin
        Route::get("makeAdmin/{id}","makeAdmin");
        // Make user
        Route::get("makeUser/{id}","makeUser");
        // Delete user
        Route::delete("deleteUser/{id}","deleteUser");
    });
    // Users orders
    Route::controller(UserOrdersController::class)->group(function() {
        // Show all orders
        Route::get("orders","index");
        // Show order
        Route::get("showOrder/{id}","show");
        // Change shipped date
        Route::put("shippedDate/{id}","shippedDate");
        // Change status
        Route::put("status/{id}","status");
        // Download order
        Route::get("download/{id}","download");
        // Search
        Route::get("searchOrder","searchOrder");
        // Delete order
        Route::delete("deleteOrder/{id}","destroy");
        // Send Email
        Route::get("message/{id}","message");
        Route::post('email','email');
        // Send sms
        Route::get("sms","sms");
    });
});

/// User Pages ///
Route::controller(UserController::class)->group(function() {
    // Categories //
        // Show all categories
        Route::get("categories/{id}","categories");
        // Show category
        Route::get("showCategory/{id}","showCategory");
        // Show all products category
        Route::get("categoryProducts/{id}","categoryProducts");

    // Products //
        // Show all products
        Route::get("products","products");
        // Show product
        Route::get("showProduct/{id}","showProduct");

    // Search //
        Route::get("search","search");

    // Make order //
        Route::post("makeOrder","makeOrder");

    // User profile //
    // Cancel order
    Route::delete("cancelOrder/{id}","cancelOrder");
    // Remove delivered order
    Route::delete("removeOrder/{id}","removeOrder");
    // Contact us
    Route::get('/contactUs','contactUs');
    Route::post('/contact','contact');
});

Route::controller(CartController::class)->group(function() {
    // Cart
    Route::get("cart","cart");
    // Add to cart
    Route::post("addToCart/{id}","addToCart");
    // Delete from cart
    Route::delete("removeFromCart/{id}","removeFromCart");
    // Delete all from cart
    Route::delete("removeAllCart","removeAllCart");
});


// Socialite
Route::controller(LoginController::class)->group(function() {
    Route::get("login/google","redirectGoogle")->name('login.google');
    Route::get("login/google/callback","redirectGoogleCallback");
});

// Language
Route::get("lang/{lang}",function($lang) {
    if($lang == "ar") {
        session()->put("lang","ar");
    }else{
        session()->put("lang","en");
    }
    return redirect()->back();
});

// Admin change color
Route::post("color",[HomeController::class,'color']);