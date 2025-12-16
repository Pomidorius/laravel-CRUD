<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Логин страница
Route::get('/login', [AuthController::class, 'showloginForm']) -> name('login');
Route::post('/login', [AuthController::class, 'login']) -> name('login.post');

// Регистрационная страница
Route::middleware('auth') -> group(function () {
    Route::get('/', function () {
        return redirect()->route('users.index');
    });
    Route::resource('users', UserController::class);
});