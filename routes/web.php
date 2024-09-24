<?php

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
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('layouts.home');
Route::get('/about', [PageController::class, 'about'])->name('layouts.about');
Route::get('/contact', [PageController::class, 'contact'])->name('layouts.contact');
Route::get('/index', [PageController::class, 'post'])->name('posts.index');
Route::resource('/posts', \App\Http\Controllers\PostController::class);
