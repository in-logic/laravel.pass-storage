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
        $credential = Credential::where('user_id', '=', Auth::id())
            ->where('credential_id', '=', $id)
            ->first();

        if(!$credential) { abort(404); }

        return view('pages.credential.index', [
            'credential' => $credential
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
        if(!$id) { return redirect()->route('home'); }

        if(Credential::destroy($id)) {
            return redirect()->route('home');
        }

        return redirect()->refresh()->with('error', 'Something went wrong.');
    }

    public function edit(int $id, Request $req): RedirectResponse
    {
        $inputs = $req->validate([
            'credential_user'   => 'required',
            'credential_token'  => 'required',
        ],[
            'credential_user.required'  => 'The password user field is required.',
            'credential_token.required' => 'The password text field is required.',
        ]);

        try {

            $credential = Credential::find($id);

            $credential->update([
                'credential_user'  => $inputs['credential_user'] ?? $credential->credential_user,
                'credential_token' => $inputs['credential_token'] ?? $credential->credential_token,
            ]);

            $credential->save();

            return redirect()->route('credential', $id)->with('success', 'Credential edited.');

        } catch (\Exception $e) {

            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }
}
