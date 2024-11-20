@extends('layouts.guest')

@section('title', 'Login')
<div>

    <x-box>
        <x-form action="{{ route('login.post') }}">
            @csrf

            <x-input
                type="email"
                placeholder="e-mail"
                label="Email"
                name="email"
            />

            <x-input
                type="password"
                placeholder="Password"
                label="Password"
                name="password"
            />

            <div>
                <a href="{{ route('register') }}" >
                    Don't have an account yet?
                </a>

                <x-button type="submit" style="success">
                    <x-slot:icon>
                        <i class="fa fa-check"></i>
                    </x-slot:icon>

                    Login
                </x-button>
            </div>

        </x-form>
    </x-box>

</div>

@section('content')

@endsection
