<?php

use App\Http\Controllers\BonuspointsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.show');

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');

Route::get('/level', function () {
    return view('posts.level');
})->name('level');


Route::get('/index', function () {
    return view('posts.index');
})->name('index');

Route::get('/level', [TodoController::class, 'showLevel'])->name('level');

Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');

Route::put('/todo/reset/{id}', [TodoController::class, 'reset'])->name('todo.reset');

Route::get('/show', [BonuspointsController::class, 'show'])->name('show');

Route::post('/show', [BonuspointsController::class, 'store'])->name('post.show');

//編集画面のルート
Route::post('/posts', [TodoController::class, 'store'])->name('post.store');

Route::get('/posts', [TodoController::class, 'create'])->name('posts.create');

Route::delete('/posts/{id}', [TodoController::class, 'destroy'])->name('posts.destroy');

