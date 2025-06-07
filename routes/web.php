<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/redirect/from", [RedirectController::class, "redirectFrom"]);
Route::get("/redirect/to", [RedirectController::class, "redirectTo"]);

Route::get("/redirect/name", [RedirectController::class, "redirectName"]);

Route::get("/redirect/name/{name}", [RedirectController::class, "redirectHello"])->name("redirect.hello");

Route::get("/redirect/action", [RedirectController::class, "redirectAction"]);

Route::get("/redirect/pzn", [RedirectController::class, "redirectAway"]);
