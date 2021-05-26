<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::put('/admin/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/admin/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
    Route::delete('/admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/admin/authorization/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/admin/authorization/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::delete('/admin/authorization/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/admin/authorization/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/admin/authorization/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::put('/admin/authorization/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach'])->name('role.attach');
    Route::put('/admin/authorization/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach'])->name('role.detach');

    Route::get('/admin/authorization/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/admin/authorization/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
    Route::delete('/admin/authorization/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/admin/authorization/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/admin/authorization/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
});
