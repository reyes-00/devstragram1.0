<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('principal');
});
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');
Route::get('/register',[RegisterController::class, 'index'])->name('resgister');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/muro',[MuroController::class, 'index'])->name('muro');

Route::post('/logout',[ LoginController::class,'logout'])->name('logout');