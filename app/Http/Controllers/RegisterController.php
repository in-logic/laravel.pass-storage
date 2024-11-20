<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the register page.
     */

    public function show(): View
    {
        return view('pages.auth.register');
    }

    /**
     * Store the user's data.
     */

    public function store(Request $req)
    {
        $inputs = $req->validate(
            [
                'username' => 'required|unique:users',
                'email'    => 'required|unique:users',
                'password' => 'required|min:3',
            ],
            [
                'username.required' => 'The username field is required.',
                'email.required'    => 'The email field is required.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'The password must be at least 6 characters long.',
            ]
        );

        $user = User::create([
            'username' => $inputs['username'],
            'email'    => $inputs['email'],
            'password' => Hash::make($inputs['password']),
        ]);

        if ($user) {

            $user = Auth::attempt([
                'email' => $inputs['email'],
                'password'  => $inputs['password'],
            ]);

            return redirect()->intended('/home');
        }

        return redirect()->back()->withInput($inputs);
    }
}
