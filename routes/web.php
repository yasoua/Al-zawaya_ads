<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CommentController;


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
//    return view('welcome');
    return redirect(route('dashboard'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [AdController::class, 'index'])->name('dashboard');
//Route::post('/dashboard', [AdController::class, 'create'])->name('add_new_ad');
//
//Route::get('/ad/{id}', [AdController::class, 'show'])->name('ad.show');

Route::resource('ad', AdController::class)/*->except('update')*/;
Route::get('ad/public/{publicLink}', [AdController::class, 'publicShow'])->name('ad.publicShow');
//Route::post('ad/update/{id}', [AdController::class, 'update'])->name('ad.update');
Route::resource('lead', LeadController::class)/*->except('index')*/;
//Route::get('lead/ad/{ad_id}', [LeadController::class, 'index'])->name('lead.index');
Route::get('lead/ad/{ad_id}', [LeadController::class, 'indexByAd'])->name('lead.indexByAd');
Route::post('lead/{id}/change-status', [LeadController::class, 'changeStatus'])->name('lead.changeStatus');
Route::post('lead/public-store', [LeadController::class, 'publicStore'])->name('lead.publicStore');

Route::resource('comment', CommentController::class);

//Route::get('lead/{ad_id}', [LeadController::class, 'show'])->name('lead.ad_id');

