<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CourseController;

use App\Http\Middleware\isAdmin;

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

//Route::get('/', function () {
    //return view('welcome');
//});

//Route::get('courses', 'CourseController@welcome');


Auth::routes();

Route::get('/', [CourseController::class, 'index'])->name('welcome');

Route::get('/home', [CourseController::class, 'home'])->name('home');

Route::get('home/myCourses', [CourseController::class, 'myCourses'])->middleware('auth')->name('myCourses');

Route::get('/subscribe/{id}', [CourseController::class, 'subscribe'])->middleware('auth')->name('subscribe');

Route::get('/unsubscribe/{id}', [CourseController::class, 'unsubscribe'])->middleware('auth')->name('unsubscribe');