<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentSetupController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// use App\Http\Controllers\AdvertismentsController;
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('about-us',[App\Http\Controllers\Frontend\FrontendController::class,'about_us']);

Route::get('contact',[App\Http\Controllers\Frontend\FrontendController::class,'contact']);

// Route::resource('city', CitiesController::class);

Route::resource('user',UserController::class,['except' => ['show'] ]);

Route::resource('profile',ProfileController::class);

Route::resource('setup',StudentSetupController::class);
