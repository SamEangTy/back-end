<?php

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
Route::post("addProduct",[ControllerProduct::class,'addProduct']);
Route::post("updateProduct/{id}",[ControllerProduct::class,'updateProduct']);
Route::delete("deleteProduct/{id}",[ControllerProduct::class,'deleteProduct']);