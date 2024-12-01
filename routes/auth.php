<?php

use Illuminate\Support\Facades\{
    Route
};

use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController
};

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
});
