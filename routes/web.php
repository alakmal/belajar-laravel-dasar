<?php

use App\Http\Controllers\HelloController;
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

Route::get("/pzn", function () {
    return "Hello Programmer Zaman Now";
});

Route::redirect("/youtube", "/pzn");

Route::get("/products/{id}", function ($id) {
    return "Products : " . $id;
})->name("products.detail");

Route::get("/products/{product}/items/{item}", function ($product, $item) {
    return "Products : " . $product . ", Items : " . $item;
})->name("products.items.detail");

Route::get("/categories/{id}", function (string $categoriId) {
    return "Categories : " . $categoriId;
})->where("id", "[0-9]+")
    ->name("category.detail"); // Only allow numeric IDs for categories


Route::get("/produk/{id}", function ($id) {
    $link = route("products.detail", ["id" => $id]);
    return "Link : " . $link;
});

Route::get("/produk-redirect/{id}", function ($id) {
    return redirect()->route("products.detail", ["id" => $id]);
})->name("produk.redirect");

Route::get("/controller/hello/{name}", [HelloController::class, "hello"]);
