<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function show(): View
    {
        return view('pages.home.index', [
            'user' => Auth::user(),
            'passwords' => Credential::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $req)
    {
        $inputs = $req->validate(
	        [
                'credential_user'  => 'required',
                'credential_token' => 'required',
                'credential_obs'   => 'required',
                'credential_token_status' => 'required',
            ],
	        [
                'credential_user.required'  => 'The password user field is required.',
                'credential_token.required'  => 'The password text field is required.',
                'credential_obs.required'   => 'The password obs field is required.',
                'application_id.required' => 'The application id field is required.',
            ]
        );

        Credential::create([
            'user_id' => Auth::id(),
            'application_id'   => $inputs['application_id'],
	        'credential_user'  => $inputs['credential_user'],
	        'credential_token' => $inputs['credential_token'],
            'credential_obs'   => $inputs['credential_obs'],
            'credential_token_status' => 'UNKNOWN'
        ]);

        return redirect()->route('home');
    }
}
