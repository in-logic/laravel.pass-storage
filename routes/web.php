<?php

use Illuminate\Support\Facades\{
    Auth,
    Route
};

use App\Http\Controllers\{
    HomeController,
    CredentialController,
    FileController
};

include_once(base_path('routes/auth.php'));

Route::middleware(['auth'])->group(function () {

    /*
    *   Home
    */

    Route::get('/home', [HomeController::class, 'show'])->name('home');

    /*
    *   Credentials
    */

    Route::get('/credential/{id}', [CredentialController::class, 'show'])->name('credential');
    Route::post('/credential/add', [CredentialController::class, 'store'])->name('credential.add');
    Route::post('/credential/delete/{id}', [CredentialController::class, 'destroy'])->name('credential.delete');
    Route::post('/credential/edit/{id}', [CredentialController::class, 'edit'])->name('credential.edit');

    Route::post('/credential/export', [CredentialController::class, 'export'])->name('credential.export.all');
    Route::post('/credential/import', [CredentialController::class, 'import'])->name('credential.import');

    /*
    *   Downloads
    */

    Route::get('/file/download/{fileName}', [FileController::class, 'download'])->name('file.download');

    /*
     *  Logout
     */

    Route::get('/logout', function () {

        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

