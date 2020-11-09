<?php

use App\Http\Controllers\APIController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::any('/', [APIController::class, 'getDataAkun'])->name('dashboard');
Route::any('/detailhero/{AKUNID}', [APIController::class, 'detailhero'])->name('detailhero');
Route::any('/detailskin/{AKUNID}', [APIController::class, 'detailskin'])->name('detailskin');
Route::any('tambahhero',[APIController::class,'tambahhero'])->name('tambahhero');
Route::any('/hapushero/{HEROID}', [APIController::class, 'hapushero'])->name('hapushero');
Route::any('tambahskin',[APIController::class,'tambahskin'])->name('tambahskin');
Route::any('/hapusskin/{SKINID}', [APIController::class, 'hapusskin'])->name('hapusskin');
