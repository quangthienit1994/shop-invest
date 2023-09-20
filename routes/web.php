<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Publish\ProductController as PublishProductController;
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

Route::group([
    "prefix" => "admin",
    "as" => "admin."
], function () {
    Route::resource('products', ProductController::class);
    Route::get('', function(){
        return view('admin/pages/dashboard');
    })->name('dashboard');
});

Route::get('/products/{product:slug}', [PublishProductController::class, 'view']);
Route::post('/add-to-cart', [PublishProductController::class, 'addToCart'])->name('add-to-cart');

Route::get('/', function () {
    return view('welcome');
});
