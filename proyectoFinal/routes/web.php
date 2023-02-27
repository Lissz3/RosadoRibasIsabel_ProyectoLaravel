<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablageneralController;
use App\Http\Controllers\TablausuarioController;

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

Auth::routes();

Route::resource('tablageneral', TablageneralController::class)->middleware('auth');
Route::resource('tablausuarios', TablausuarioController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
