<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailConfigController; 
use App\Http\Controllers\MailConfigController;

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


Route::get('/', [EmailConfigController::class, 'index'])->name('email-config');
Route::post('post',[EmailConfigController::class, 'store'])->name('email-config.store');
Route::put('update/{id}',[EmailConfigController::class, 'update'])->name('email-config.update');

Route::get('/mail',[MailConfigController::class, 'index'])->name('mail-config');
Route::post('/mail-post',[MailConfigController::class, 'update_config'])->name('mail-config.update');

Route::get('/notice',[MailConfigController::class, 'notice'])->name('notice');