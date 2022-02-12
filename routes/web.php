<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanDetailController;
use App\Http\Controllers\ProcessDataController;

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

Route::get('/loan_detail', [LoanDetailController::class,'index'])->name('loan_detail') ;
Route::get('/ProcessData', [ProcessDataController::class,'index'])->name('process_data') ;

Route::post('/ProcessData', [ProcessDataController::class,'create'])->name('ProcessData') ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
