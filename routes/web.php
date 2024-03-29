<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\IndexController;


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



Route::get('/', function () {
    return view('posts.welcome');
});

Auth::routes();

Route::post('/posts', [TodoController::class, 'store'])->name('post.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.show');

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');

// 下記追記します0329
Route::get('/posts/create', [TodoController::class, 'create'])->name('posts.crete');





