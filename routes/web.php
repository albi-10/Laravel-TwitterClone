<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

Route::post('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('post.likes');

Route::post('/post/{post}/dislikes', [App\Http\Controllers\PostDislikeController::class, 'store'])->name('post.dislikes');
Route::delete('/post/{post}/dislikes', [App\Http\Controllers\PostDislikeController::class, 'destroy'])->name('post.dislikes');


Route::get('/profile/{user:name}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

// Zum Test für Ajax
Route::get('/', [App\Http\Controllers\CrudController::class, 'index']);
Route::resource('todo', App\Http\Controllers\CrudController::class);
// Ajax Ende
