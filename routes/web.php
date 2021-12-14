<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
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
    return view('landing');
})->name('landing');
Route::get('/organization', function () {
    return view('organization-login');
})->name('organization');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Auth::routes();
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login-view')->middleware(['restrictLogin']);
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login')->middleware(['restrictLogin']);
// Registration Routes...
Route::get('organization/register', [\App\Http\Controllers\LandingController::class, 'showOrganizationRegistrationForm'])->name('organization-register');
Route::post('organization/register', [\App\Http\Controllers\LandingController::class, 'registerOrganization'])->name('organization-register');
Route::post('organization/check', [\App\Http\Controllers\Controllers_be\OrganizationController::class, 'organizationCheck'])->name('organization-check');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('organization-show/{id}', [ProfileController::class, 'showLanding'])->name('organization-show');
Route::get('checkoutOrders/search', [\App\Http\Controllers\CheckoutOrderController::class, 'search'])->name('order-search');
Route::get('rawMaterialImports/search', [\App\Http\Controllers\RawMaterialImportController::class, 'search'])->name('spending-search');
Route::get('attendances/search', [\App\Http\Controllers\AttendanceController::class, 'search'])->name('attendance-search');

Route::middleware(['auth', 'checkPermission'])->group(function () {


    Route::resource('menus', App\Http\Controllers\MenuController::class);

    Route::resource('rawMaterialImports', App\Http\Controllers\RawMaterialImportController::class);
    Route::resource('checkoutOrders', App\Http\Controllers\CheckoutOrderController::class);
    Route::resource('notes', App\Http\Controllers\NoteController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::post('checkoutOrders/create-note', [\App\Http\Controllers\CheckoutOrderController::class, 'createNote'])->name('create-note');
    Route::post('checkoutOrders/update-note', [\App\Http\Controllers\CheckoutOrderController::class, 'updateNote'])->name('update-note');
    Route::post('get-menu-price', [\App\Http\Controllers\CheckoutOrderController::class, 'getMenuPrice'])->name('get-menu-price');
    Route::get('order-toggle-status', [\App\Http\Controllers\CheckoutOrderController::class, 'toggleStatus'])->name('order-toggle-status');
    Route::get('import-toggle-status', [\App\Http\Controllers\RawMaterialImportController::class, 'toggleStatus'])->name('import-toggle-status');
    Route::get('menu-toggle-status', [\App\Http\Controllers\MenuController::class, 'toggleStatus'])->name('menu-toggle-status');
    Route::get('provider-toggle-status', [\App\Http\Controllers\ProviderController::class, 'toggleStatus'])->name('provider-toggle-status');
    Route::get('position-toggle-status', [\App\Http\Controllers\PositionController::class, 'toggleStatus'])->name('position-toggle-status');
    Route::get('employee-toggle-status', [\App\Http\Controllers\EmployeeController::class, 'toggleStatus'])->name('employee-toggle-status');
    Route::get('spending-export/', [\App\Http\Controllers\RawMaterialImportController::class, 'export'])->name('spending-export');
    Route::get('bill-export', [\App\Http\Controllers\CheckoutOrderController::class, 'export'])->name('bill-export');
    Route::resource('providers', App\Http\Controllers\ProviderController::class);
    Route::resource('positions', App\Http\Controllers\PositionController::class);
    Route::resource('employees', App\Http\Controllers\EmployeeController::class);
    Route::resource('units', App\Http\Controllers\UnitController::class);
    Route::get('attendances/create-additional', [\App\Http\Controllers\AttendanceController::class, 'createAdditional'])->name('attendance-create-additional');
    Route::post('attendances/store-additional', [\App\Http\Controllers\AttendanceController::class, 'storeAdditional'])->name('attendances-store-additional');
    Route::resource('attendances', App\Http\Controllers\AttendanceController::class);
    Route::post('profile/get-product-ids', [\App\Http\Controllers\ProfileController::class, 'getProductIds'])->name('profiles-get-product-ids');
    Route::resource('profiles', \App\Http\Controllers\ProfileController::class)->except(['index', 'create', 'destroy']);
    Route::resource('users', \App\Http\Controllers\UserController::class);

});





