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


Route::get('/unsubscribe/{id}', [CourseController::class, 'unsubscribe'])->middleware('auth')->name('unsubscribe');

Route::get('/subscribe/{id}', [CourseController::class, 'subscribe'])->middleware('auth')->name('subscribe');

Route::get('home/myCourses/confirmation',[CourseController::class, 'sendEmail'])->middleware('auth')->name('confirmation');

Route::get('/home/create',[CourseController::class,'create'])->name('create');

Route::post('/home/create',[CourseController::class,'store'])->name('store');

Route::get('/home/delete/{id}',[CourseController::class,'destroy'])->name('delete');

Route::get('/home/edit/{id}',[CourseController::class,'edit'])->name('edit');

Route::post('/home/update/{id}',[CourseController::class,'update'])->name('update');