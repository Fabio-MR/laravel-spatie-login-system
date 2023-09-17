<?php


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    route::controller(BrandsController::class)->group(function () {
        Route::get('/brands', 'index')->name('brands.index');
    });

    route::controller(CategoriesController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
    });

    route::controller(ProductsController::class)->group(function () {
        Route::get('/Products', 'index')->name('products.index');
    });

    route::controller(PermissionsController::class)->group(function () {
        Route::get('/permission', 'index')->name('permissions.index');
        Route::get('/permission/create', 'create')->name('permissions.create');
        Route::get('/permission/{permission}/edit', 'edit')->name('permissions.edit');
        Route::post('/permission', 'store')->name('permissions.store');
        Route::put('/permission/{id}/update', 'update')->name('permissions.update');
    });

    route::controller(RolesController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles.index');
        Route::get('/roles/create', 'create')->name('roles.create');
        Route::post('/roles/store', 'store')->name('roles.store');
        Route::get('/roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('/roles/{role}', 'update')->name('roles.update');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::get('/users/destroy', 'destroy')->name('users.destroy');
        Route::put('/users/{user}/update', 'update')->name('users.update');
        Route::post('/users', 'store')->name('users.store');
    });

});