<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware("api")->group(function(){

    Route::prefix("auths")->controller(AuthController::class)->group(function(){
        Route::post("login", "login");
        Route::post("logout", "logout")->middleware("auth:sanctum");
        Route::get("me", "me")->middleware("auth:sanctum");
    });

    Route::prefix("owners")->controller(UserController::class)->middleware("auth:sanctum")->group(function(){
        Route::post("store", "storeOwner");
    });

    Route::prefix("cashiers")->controller(UserController::class)->group(function(){
        Route::post("store", "storeCashier");
    });


});