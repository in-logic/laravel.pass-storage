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
        $credentials = Credential::where('user_id', Auth::id())
            ->join('applications', 'applications.application_id', '=', 'credentials.application_id')
            ->get();

        return view('pages.home.index', [
            'user' => Auth::user(),
            'credentials' => $credentials,
            'applications' => Application::all()->pluck('application_name', 'application_id')
        ]);
    }
}
