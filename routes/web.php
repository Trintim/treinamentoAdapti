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




Route::get('/', [PostsController::class, 'index']);

Route::get('admin/posts', [PostsAdminController::class, 'index'])->name('admin.posts.index');
Route::get('admin/posts/create', [PostsAdminController::class, 'create'])->name('admin.posts.create');
Route::post('admin/posts/store', [PostsAdminController::class, 'store'])->name('admin.posts.store');
Route::get('admin/posts/edit/{id}', [PostsAdminController::class, 'edit'])->name('admin.posts.edit');
Route::put('admin/posts/updade/{id}', [PostsAdminController::class, 'update'])->name('admin.posts.update');
Route::get('admin/posts/destroy/{id}', [PostsAdminController::class, 'destroy'])->name('admin.posts.destroy');


