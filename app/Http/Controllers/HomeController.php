<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function show(): View
    {
        return view('pages.home.index', [
            'user' => Auth::user(),
            'passwords' => Password::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $req)
    {
        $inputs = $req->validate(
	    [
		'password_user'  => 'required',
                'password_text'  => 'required',
                'password_obs'   => 'required',
                'application_id' => 'required',
            ],
	    [
                 'password_user.required'  => 'The password user field is required.',
                'password_text.required'  => 'The password text field is required.',
                'password_obs.required'   => 'The password obs field is required.',
                'application_id.required' => 'The application id field is required.',
            ]
        );

        Password::create([
            'user_id' => Auth::id(),
            'application_id' => $inputs['application_id'],
	    'password_user' => $inputs['password_user'],
	    'password_text' => $inputs['password_text'],
            'password_obs' => $inputs['password_obs'],
            'password_status' => 'UNKNOWN'
        ]);

        return redirect()->route('home');
    }
}
