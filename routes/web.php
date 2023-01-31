<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, "index"])->name("Home");


Route::get('/about', [HomeController::class, "about"])->name("About");


Route::resource('posts', PostController::class)->except(["index"])->middleware("auth");

// Route::prefix("posts")->name("Posts.")->group(function(){

//     Route::get("/create", [PostController::class, "create"])->name("Create");

//     Route::post('/', [PostController::class, "store"])->name("Store");

// });




Route::match(["GET", "POST"], "/register", [AuthController::class, "register"])->name("register")->middleware("guest");


Route::match(["GET", "POST"], "/login", [AuthController::class, "login"])->name("login")->middleware("guest");


Route::get("/logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");
