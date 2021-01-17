<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
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

Route::get('/' , [EventController::class , 'welcome'])->middleware('guest')->name('welcome');

Route::get('/search/', [EventController::class , 'search'])->middleware('guest')->name('search');

Route::get('/add_event', [EventController::class, 'create'])->middleware('auth')->name('addEvent');

Route::post('/add_event', [EventController::class, 'store'])->middleware('auth')->name('addEvent.store');

Route::get('/event/{id}/detail', [EventController::class, 'eventDetail'])->middleware('auth')->name('event.detail');

Route::get('/dashboard', [EventController::class, 'home'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
