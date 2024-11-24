<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CredentialController
{
    public function show(int $id): View
    {
        return view('pages.credential.index', [
        ]);
    }
}
