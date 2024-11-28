<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CredentialController
{
    public function show(int $id): View
    {
        return view('pages.credential.index', [
            'credential' => Credential::find($id)
        ]);
    }

    public function store(Request $req): RedirectResponse
    {
        $inputs = $req->validate(
	        [
                'credential_user'  => 'required',
                'credential_token' => 'required',
                'application'      => 'required'
            ],
	        [
                'credential_user.required'  => 'The password user field is required.',
                'credential_token.required' => 'The password text field is required.',
                'application.required'      => 'The application field is required.',
            ]
        );

        Credential::create([
            'user_id'          => Auth::id(),
            'application_id'   => $inputs['application'],
	        'credential_user'  => $inputs['credential_user'],
	        'credential_token' => $inputs['credential_token'],
            'credential_token_status' => 'UNKNOWN'
        ]);

        return redirect()->route('home');
    }

    public function destroy(int $id): RedirectResponse
    {
        if(!isset($id) || empty($id))
        {
            return redirect()->route('home');
        }

        if(Credential::destroy($id))
        {
            return redirect()->route('home');
        }

        return redirect()->route('home');
    }

    public function edit(int $id): RedirectResponse
    {

    }
}
