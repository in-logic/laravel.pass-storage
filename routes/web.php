<?php

use Illuminate\Support\Facades\{
    Auth,
    Route
};

use App\Http\Controllers\{
	HomeController,
	CredentialController
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

Route::middleware(['auth'])->group(function() {

    /*
    *   Home
    */

	Route::get('/home', [HomeController::class, 'show'])->name('home');

    /*
    *   Credentials
    */

    Route::get('/credential/{id}',         [CredentialController::class, 'show'])->name('credential');
    Route::post('/credential/add',         [CredentialController::class, 'store'])->name('credential.add');
    Route::post('/credential/delete/{id}', [CredentialController::class, 'destroy'])->name('credential.delete');
    Route::post('/credential/edit',        [CredentialController::class, 'edit'])->name('credential.edit');

    Route::get('/logout', function () {

        Auth::logout();
        return redirect()->route('login');

    })->name('logout');
});
