<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/user/{id}/change-password', [ChangePasswordController::class, 'changePassword'])->name('user.change-password');
    Route::post('/user/{id}/change-password', [ChangePasswordController::class, 'updateChangePwd'])->name('user.update.change.password');

    // Post
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/confirm', [PostController::class, 'createConfirm'])->name('post.create.confirm');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{id}/confirm', [PostController::class, 'editConfirm'])->name('post.edit.confirm');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/post/detail/{id}', [PostController::class, 'show'])->name('post.show');

    // CSV
    Route::get('/posts/export/', [PostController::class, 'export'])->name('post.export');
    Route::get('/posts/import', [PostController::class, 'importView'])->name('post.import.view');
    Route::post('/posts/import', [PostController::class, 'import'])->name('post.import');

    // User
    Route::get('/user/{id}/', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}/confirm', [UserController::class, 'editConfirm'])->name('user.edit.confirm');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/detail/{id}/', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{userId}/posts', [UserController::class, 'getPostByUserId'])->name('user.post');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/confirm', [UserController::class, 'createConfirm'])->name('user.create.confirm');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
});

require __DIR__ . '/auth.php';
