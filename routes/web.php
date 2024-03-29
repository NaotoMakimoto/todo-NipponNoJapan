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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');

Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.show');

// Route::get('/index', [IndexController::class, 'index']);

// routes/web.php

Route::get('/level', function () {
    return view('posts.level');
})->name('level');

// routes/web.php

Route::get('/index', function () {
    return view('posts.index');
})->name('index');

// Route::get('/level', 'TodoController@level')->name('level');

Route::get('/level', 'App\Http\Controllers\TodoController@level')->name('level');

Route::get('/get-points', [TodoController::class, 'getPoints'])->name('get.points');
