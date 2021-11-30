<?php

use App\Http\Controllers\FileController;
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
])->name('home')->middleware('auth');
Route::get('checkoutOrders/search',[\App\Http\Controllers\CheckoutOrderController::class,'search'])->name('order-search');
Route::get('rawMaterialImports/search',[\App\Http\Controllers\RawMaterialImportController::class,'search'])->name('spending-search');

Route::middleware(['auth'])->group(function () {
    Route::resource('menus', App\Http\Controllers\MenuController::class);
    Route::resource('rawMaterialImports', App\Http\Controllers\RawMaterialImportController::class);
    Route::resource('checkoutOrders', App\Http\Controllers\CheckoutOrderController::class);
    Route::resource('notes', App\Http\Controllers\NoteController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::post('checkoutOrders/create-note',[\App\Http\Controllers\CheckoutOrderController::class,'createNote'])->name('create-note');
    Route::post('checkoutOrders/update-note',[\App\Http\Controllers\CheckoutOrderController::class,'updateNote'])->name('update-note');
    Route::post('get-menu-price',[\App\Http\Controllers\CheckoutOrderController::class,'getMenuPrice'])->name('get-menu-price');
    Route::get('order-toggle-status',[\App\Http\Controllers\CheckoutOrderController::class,'toggleStatus'])->name('order-toggle-status');
    Route::get('import-toggle-status',[\App\Http\Controllers\RawMaterialImportController::class,'toggleStatus'])->name('import-toggle-status');
    Route::get('menu-toggle-status',[\App\Http\Controllers\MenuController::class,'toggleStatus'])->name('menu-toggle-status');
    Route::get('provider-toggle-status',[\App\Http\Controllers\ProviderController::class,'toggleStatus'])->name('provider-toggle-status');
    Route::get('spending-export/', [\App\Http\Controllers\RawMaterialImportController::class,'export'])->name('spending-export');
    Route::get('bill-export', [\App\Http\Controllers\CheckoutOrderController::class,'export'])->name('bill-export');
});





Route::resource('providers', App\Http\Controllers\ProviderController::class);
