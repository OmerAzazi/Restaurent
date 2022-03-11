<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get("/", [HomeController::class, "index"]);

Route::get("/redirects", [HomeController::class, "redirects"]);

Route::get("/foodmenu", [AdminController::class, "foodmenu"]);

Route::get("/food", [AdminController::class, "food"]);

Route::get("/deletemenu/{id}", [AdminController::class, "deletemenu"]);

Route::get("/updateview/{id}", [AdminController::class, "updateview"]);




Route::post("/uploadfood", [AdminController::class, "upload"]);

Route::post("/update/{id}", [AdminController::class, "update"]);

Route::post("/addcart/{id}", [HomeController::class, "addcart"]);

Route::get("/showcart/{id}", [HomeController::class, "showcart"]);

Route::get("/home", [HomeController::class, "home"]);

Route::get("removecart/{id}", [HomeController::class, "removeCart"]);

Route::get("/check/{id}", [HomeController::class, "check"]);

Route::post("/orderplace/{id}", [HomeController::class, "order"]);


















Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
