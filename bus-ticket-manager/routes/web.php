<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bus_comp_Controller;
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
    return view('welcome');
});

Route::get('/brand', [App\Http\Controllers\bus_comp_Controller::class, 'index'])->name('brand');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::POST('BrandAddTicketSubmit','App\Http\Controllers\BrandTicketPublishedController@BrandAddTicketSubmit');
Route::POST('BrandDeleteTicketSubmit','App\Http\Controllers\BrandTicketPublishedController@BrandDeleteTicketSubmit');


Route::get('bus_company_profile_edit', [App\Http\Controllers\Bus_company_profile_edit_Controller::class, 'show_profile'])->name('bus_company_profile_edit');
Route::POST('profile_update','App\Http\Controllers\Bus_company_profile_edit_Controller@profile_update');

Route::get('/profile_page', [App\Http\Controllers\profile_Controller::class, 'show_profile'])->name('profile');
Route::POST('profile_update','App\Http\Controllers\profile_Controller@profile_update');