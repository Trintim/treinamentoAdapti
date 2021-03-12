<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PostsController::class, 'index'])->name('home');


Route::group(['prefix' => 'auth'], function () {
    Route::get('', [AuthController::class, 'redirect'])->name('auth.redirect');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('', [PostsAdminController::class, 'index'])->name('admin.posts.index');
        Route::get('create', [PostsAdminController::class, 'create'])->name('admin.posts.create');
        Route::post('store', [PostsAdminController::class, 'store'])->name('admin.posts.store');
        Route::get('edit/{id}', [PostsAdminController::class, 'edit'])->name('admin.posts.edit');
        Route::put('update/{id}', [PostsAdminController::class, 'update'])->name('admin.posts.update');
        Route::get('destroy/{id}', [PostsAdminController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
