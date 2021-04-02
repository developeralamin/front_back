<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

//Setup Management Controller
use App\Http\Controllers\Backend\Setup\StudentSetupController;
use App\Http\Controllers\Backend\Setup\YearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\DesingnationController;



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
//Route for Sales


// use App\Http\Controllers\UserSalesController;
// Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');

// Route::post('users/{id}/invoices',[UserSalesController::class,'createinvoice'])->name('user.sales.store');
// Route::get('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'detialsinvoice'])->name('user.sales.invoice_details');


// Route::delete('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'destroy'])->name('user.sales.destroy');

// Route::post('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'additem'])->name('user.sales.invoice.additem');

// Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',[UserSalesController::class,'destroyItem'])->name('user.sales.invoice.delete_item');
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

//Setup Management all Route
Route::resource('setup',StudentSetupController::class);
Route::resource('year',YearController::class);
Route::resource('student_group',StudentGroupController::class);
Route::resource('shift',StudentShiftController::class);
Route::resource('fee',FeeCategoryController::class);
Route::resource('amount',FeeAmountController::class);
Route::resource('exam_type',ExamTypeController::class);
Route::resource('setup_subject',SubjectController::class);
Route::resource('designation_setup',DesingnationController::class);










