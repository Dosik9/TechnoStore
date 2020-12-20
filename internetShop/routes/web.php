<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
//use \App\Http\Controllers\BrandController;
//use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\TelecommunicationController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\OrderController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[MainController::class, 'index'])->name('home');
Route::get('/p/{slug_name}',[MainController::class, 'product'])->name('product-page');
Route::get('/all-categories',[MainController::class, 'p_store'])->name('store');



Route::group(['middleware'=>'auth'], function (){
    Route::get('/basket', [OrderController::class, 'basket'])->name('basket');
    Route::post('basket/order', [OrderController::class, 'order'])->name('order');
    Route::post('basket/order/save', [OrderController::class, 'confirmOrder'])->name('order-save');
    Route::post('/basket/add/{id}', [OrderController::class, 'basketAdd'])->name('basket-add');
    Route::post('/basket/remove/{id}', [OrderController::class, 'basketRemove'])->name('basket-remove');

Route::group(['middleware'=>'is_admin'], function (){
    Route::resource('/brands',BrandController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/subcategories',SubcategoryController::class);
    Route::resource('/telecoms',TelecommunicationController::class);
    Route::resource('/products',ProductController::class);
    Route::resource('/orders',OrderController::class);
});


});


