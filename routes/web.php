<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get("/", [HomeController::class,"index"]);

Route::get("/users", [AdminController::class,"user"]);

Route::get("/deletemenu/{id}", [AdminController::class,"deletemenu"]);

Route::get("/foodmenu", [AdminController::class,"foodmenu"]);

Route::post("/uploadfood", [AdminController::class,"upload"]);

Route::get("/deleteuser/{id}", [AdminController::class,"deleteuser"]);

Route::get("/updateview/{id}", [AdminController::class,"updateview"]);

Route::post("/update/{id}", [AdminController::class,"update"]);

Route::post("/reservation", [AdminController::class,"reservation"]);

Route::get("/redirects", [HomeController::class,"redirects"]);

Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
