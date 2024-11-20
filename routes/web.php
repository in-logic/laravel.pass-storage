<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {

    /*
    *   Homepage
    */

    Route::get('/', function () {
        return view('homepage');
    });

    /*
    *   Auth
    */

    Route::get('/login',  [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    });
});

Route::middleware(['auth'])->group(function() {

    /*
    *   Home
    */

    Route::get('/home', [HomeController::class, 'show'])->name('home');
});
