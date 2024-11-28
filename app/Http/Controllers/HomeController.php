<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Credential;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function show(): View
    {
        return view('pages.home.index', [
            'user' => Auth::user(),
            'credentials' => Credential::where('user_id', Auth::id())->get(),
            'applications' => Application::all()->pluck('application_name', 'application_id')
        ]);
    }
}
