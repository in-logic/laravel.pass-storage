<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login page.
     */

    public function show(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Check the user's login credentials.
     */

    public function store(Request $req)
    {
        $inputs = $req->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:3',
            ],
            [
                'email.required'    => 'The username field is required.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'The password must be at least 6 characters long.',
            ]
        );

        if (Auth::attempt($inputs))
        {
            $req->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect()->back()->withInput($inputs);
    }
}
