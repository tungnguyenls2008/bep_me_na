<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::resource('menus', App\Http\Controllers\MenuController::class);

Route::resource('rawMaterialImports', App\Http\Controllers\RawMaterialImportController::class);

Route::resource('rawMaterialImports', App\Http\Controllers\RawMaterialImportController::class);

Route::post('checkoutOrders/create-note',[\App\Http\Controllers\CheckoutOrderController::class,'createNote'])->name('create-note');
Route::post('checkoutOrders/update-note',[\App\Http\Controllers\CheckoutOrderController::class,'updateNote'])->name('update-note');
Route::post('checkoutOrders/search',[\App\Http\Controllers\CheckoutOrderController::class,'search'])->name('search');
Route::get('bill-export', [\App\Http\Controllers\CheckoutOrderController::class,'export'])->name('bill-export');

Route::post('get-menu-price',[\App\Http\Controllers\CheckoutOrderController::class,'getMenuPrice'])->name('get-menu-price');

Route::resource('checkoutOrders', App\Http\Controllers\CheckoutOrderController::class);


Route::resource('notes', App\Http\Controllers\NoteController::class);


Route::resource('customers', App\Http\Controllers\CustomerController::class);