<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('/posts', PostsController::class)->middleware('auth');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//use App\Http\Controllers\LoginController;
//use App\Http\Controllers\PostsController;
//use App\Http\Controllers\RegisterController;
//use Illuminate\Support\Facades\Route;
//
//Route::get('/', function () {
//    return view('auth.login');
//});
//
//Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
//Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
//    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
//    Route::get('posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
//    Route::put('posts/{post}', [PostsController::class, 'update'])->name('posts.update');
//    Route::delete('posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
//    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
//});
//
//Route::middleware('guest')->group(function () {
//    Route::get('/register', [RegisterController::class, 'register'])->name('register');
//    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
//
//    Route::get('/login', [LoginController::class, 'login'])->name('login');
//    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
//});










