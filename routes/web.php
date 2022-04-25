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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);
Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

Route::post('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/post/{post}/likes', [App\Http\Controllers\PostLikeController::class, 'destroy'])->name('post.likes');

Route::post('/post/{post}/dislikes', [App\Http\Controllers\PostDislikeController::class, 'store'])->name('post.dislikes');
Route::delete('/post/{post}/dislikes', [App\Http\Controllers\PostDislikeController::class, 'destroy'])->name('post.dislikes');


Route::get('/profile/{user:name}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('profile', 'App\Http\Controllers\ProfilesController@profile');
Route::post('profile', [App\Http\Controllers\ProfilesController::class, 'update_avatar']);

Route::get('/students',[App\Http\Controllers\StudentController::class, 'index']);
Route::post('/add-student', [App\Http\Controllers\StudentController::class, 'addStudent'])->name('student.add');

//ajaxPost

Route::get('/ajaxpost',[App\Http\Controllers\PostController::class, 'index2']);
Route::post('/add-ajaxpost', [App\Http\Controllers\PostController::class, 'store2'])->name('ajax.add');

Route::get("/cp",[App\Http\Controllers\ProfilesController::class, "changeProfilepicture"]);
//Route::resource('userprofile', [App\Http\Controllers\ProfilesController::Class, ]);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
//Route::get('/profile', 'App\Http\Controllers\HomeController@profile')->name('profile');
Route::resource('userprofile','App\Http\Controllers\UserprofileController');

Route::get('/chart', [App\Http\Controllers\ChartController::class, 'index']);

//
Route::get('/phpinfo', function() {
    return phpinfo();
});


