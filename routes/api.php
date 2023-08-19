<?php

use App\Http\Controllers\ControllerCategery;
use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\ControllerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//login route
Route::post("login",[ControllerUser::class,'login']);
Route::post("register",[ControllerUser::class,'register']);
// home route
Route::get("homepage",[ControllerHome::class,'homepage']);
Route::post("update-home/{id}",[ControllerHome::class,'updateHome']);
// product route
Route::get("listProduct",[ControllerProduct::class,'listProduct']);
Route::get("getOne/{id}",[ControllerProduct::class,'getOne']);
Route::post("addProduct",[ControllerProduct::class,'addProduct']);
Route::post("updateProduct/{id}",[ControllerProduct::class,'updateProduct']);
Route::delete("deleteProduct/{id}",[ControllerProduct::class,'deleteProduct']);
//categery
Route::get("listCategery",[ControllerCategery::class,'listCategery']);
Route::get("getOneCategery/{id}",[ControllerCategery::class,'getOne']);
Route::post("addCategery",[ControllerCategery::class,'addCategery']);
Route::post("updateCategery/{id}",[ControllerCategery::class,'updateCategery']);
Route::delete("deleteCategery/{id}",[ControllerCategery::class,'deleteCategery']);
