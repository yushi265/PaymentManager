<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TravelController;

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

Route::get('/', [TravelController::class, 'index'])->name('index');
// require __DIR__.'/auth.php';

Auth::routes();

Route::resource('/travels', TravelController::class)->except(['index']);
Route::resource('/payments', PaymentController::class)->except(['index']);
