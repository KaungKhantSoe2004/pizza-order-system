<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\user\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view("register");
// });

Route::middleware(['admin_auth'])->group(
    function(){
        Route::redirect('/', 'loginPage');
        Route::get("loginPage", [AuthController::class, "loginPage"])->name("auth#loginPage");
        Route::get("registerPage", [AuthController::class, "registerPage"])->name("auth#registerPage");
    }
);

Route::middleware([
    'auth',
])->group(function () {



// direct Dashboard
Route::get('dashboard', [AuthController::class, 'dashboard'])->name("dashboard");
   // direct category
Route::group(['prefix'=>"category", 'middleware'=> "admin_auth"], function(){
    Route::get("list", [CategoryController::class, 'list'])->name("category#list");
    Route::get("create/page", [CategoryController::class, 'createPage'])->name("category#createPage");
    Route::post("createCategory", [CategoryController::class, "createCategory"])->name("createCategory");
    Route::get("delete/{id}", [CategoryController::class, "deleteCategory"])->name("deleteCategory");
    Route::get("edit/{id}", [CategoryController::class, 'editCategoryPage'])->name("editCategoryPage");
Route::post("editCategory", [CategoryController::class, 'editCategory'])->name("editCategory");


});

Route::group(['prefix'=>"password"], function(){

  Route::middleware(['admin_auth'])->group(function () {
      Route::get("changePassword", [AuthController::class, "changePasswordPage"])->name("changePasswordPage");
      Route::post("changingPassword", [AuthController::class, "changePassword"])->name("changePassword");
  });

  Route::group(["prefix"=>'user'], function(){
    Route::get('userListPage', [AdminUserController::class, 'userListPage'])->name('admin#userListPage');
    Route::get('changeRole',[AdminUserController::class, 'changeRole'])->name("admin#changeRole");
    Route::get('delete', [AdminUserController::class, 'delete'])->name('admin#deleteUserAccount');
    Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('admin#editUserAccount');
    Route::post('update', [AdminUserController::class, 'update'])->name('admin#updateUserAccount');
  });

// order page
Route::group(['prefix'=>"order"], function(){
    Route::get("orderList/{status?}", [OrderController::class, 'orderListPage'])->name("order#orderListPage");
    Route::get("eachOrder/{orderCode}/{total}", [OrderController::class, "eachOrderPage"])->name('order#eachOrderPage');
    Route::get("jquery/changeStatus", [OrderController::class, "changeStatus"])->name("order#changeStatus");
});


// product page
Route::prefix('product')->group(function () {
   Route::get("list", [ProductController::class, "list"])->name("product#list");
   Route::get("createPage", [ProductController::class, "createPage"])->name("product#createPage");
   Route::post("create", [ProductController::class, "create"])->name("product#create");
   Route::get("productDelete/{id}", [ProductController::class, "delete"])->name("product#delete");
   Route::get("productEdit/{id}", [ProductController::class, "editPage"])->name("product#editPage");
   Route::get("productDetails/{id}", [ProductController::class, "detailsPage"])->name("product#detailsPage");
   Route::post("productEdit", [ProductController::class, "edit"])->name("product#edit");

});


// profiel page
Route::prefix('account')->group(function () {
    Route::get("details", [AccountController::class, 'details'])->name("account#details");
    Route::get("editPage", [AccountController::class, "editPage"])->name("account#editPage");
   Route::post("edit", [AccountController::class, "edit"])->name("account#edit");
   Route::get("list", [AccountController::class, 'list'])->name("account#list");
   Route::get("delete/{id}", [AccountController::class, 'delete'])->name("account#delete");
   Route::get('adminDemote', [AccountController::class, 'demote'])->name("account#demote");
});


// contact
Route::group(['prefix'=>"contact"], function(){
Route::get("contactPage", [ContactController::class, 'contactPage'])->name('admin#mailListPage');
Route::get("delete/{contact_id}",[ContactController::class,'delete'])->name("admin#deleteMail");
Route::get('contactInfo/{contact_id}',[ContactController::class, "contactInfo"])->name('admin#contactInfo');
});

});

// direct user Home page
Route::group(['prefix'=>"user", 'middleware'=> "user_auth"], function(){
    Route::get("home/{category?}",[UserController::class, 'homePage'])->name("user#home");
    Route::get('contactPage', [UserController::class, 'contactPage'])->name('user#contactPage');
    Route::post('contactUser', [UserController::class, 'contactUser'])->name("user#contact");
   Route::get("pizzaInfo/{productId}", [UserController::class, "userInfo"])->name("user#directInfo");
Route::get("orderPage", [UserController::class, "orderPage"])->name("user#orderPage");
// ajax pizza
Route::get("jquery/pizza", [UserController::class, "jPizza"])->name("user#jPizza");
Route::get('jquery/viewCount',[UserController::class, 'viewCount'])->name("user#viewCount");
Route::get("jquery/order", [UserController::class, "jOrder"])->name("user#jOrder");
Route::get("jquery/clearCart", [UserController::class, 'jClearCart'])->name("user#jClearCart");
Route::get('jquery/eachCartRemove', [UserController::class, 'eachCartRemove'])->name("user#eachCartRemove");
Route::get('jquery/deleteOrder',[UserController::class, 'deleteOrder'])->name("user#deleteOrder");
Route::group(['prefix'=> "account"], function(){
    Route::get("profilePage", [AccountController::class, 'userProfilePage'])->name("user#profilePage");
Route::get("changePasswordPage", [AccountController::class, "userChangePasswordPage"])->name("user#changePasswordPage");
Route::post("changePassword", [AccountController::class, 'userChangePassword'])->name("user#changePassword");
Route::get("editProfilePage", [AccountController::class, 'editProfilePage'])->name("user#editProfilePage");
Route::post('edit',[AccountController::class, 'userEdit'])->name("user#edit");
});

Route::group(["prefix"=>"cart"], function(){
    Route::get("cartPage", [CartController::class, 'cartPage'])->name("cartPage");
    Route::get("toCart", [CartController::class, "cart"])->name("cart");
});

});


});


// Route::get("register", function(){
//     return view("register");
// });
// Route::get("loginPage", function(){
//     return view("login");
// });



