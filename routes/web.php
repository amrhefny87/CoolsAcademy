<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CourseController;

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
Route::get('/home', [CourseController::class, 'home'])->name('home');


Auth::routes();

Route::get('/', [CourseController::class, 'index'])->name('welcome');

Route::get('/myCourses', [CourseController::class, 'myCourses'])->name('myCourses');