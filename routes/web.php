<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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

Route::post("/input/hello", [\App\Http\Controllers\InputController::class, "hello"])
    ->name("input.hello");

Route::post("/input/hello/first", [InputController::class, "helloFirst"]);

Route::post("/input/hello/input", [InputController::class, "helloInput"]);

Route::post("input/hello/array", [InputController::class, "arrayInput"]);

Route::post("/input/type", [InputController::class, "type"]);
