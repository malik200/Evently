<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\EventController;
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
})->middleware('guest');

Route::get('/add_event', [EventController::class, 'create'])->middleware('auth')->name('addEvent');

Route::get('/event/{id}/detail', [EventController::class, 'eventDetail'])->middleware('auth')->name('event.detail');

Route::post('/add_event', [EventController::class, 'store']);

Route::get('/dashboard', [EventController::class, 'home'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
