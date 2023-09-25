<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController:: class, 'edit'])->name('user.edit');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/confirm', [PostController::class, 'createConfirm'])->name('post.create.confirm');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{id}/confirm', [PostController::class, 'editConfirm'])->name('post.edit.confirm');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'delete'])->name('post.delete');

    Route::get('/posts/export/', [PostController::class, 'export'])->name('post.export');
    Route::get('/posts/import', [PostController::class, 'importView'])->name('post.import.view');
    Route::post('/posts/import', [PostController::class, 'import'])->name('post.import');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
});

require __DIR__.'/auth.php';
