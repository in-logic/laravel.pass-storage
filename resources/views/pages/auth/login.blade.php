@extends('layouts.guest')

@section('title', 'Login')
<div>

    <x-layout.box>
        <x-layout.form action="{{ route('login.post') }}">
            @csrf

            <x-ui.input
                type="email"
                placeholder="e-mail"
                label="Email"
                name="email"
            />

            <x-ui.input
                type="password"
                placeholder="Password"
                label="Password"
                name="password"
            />

            <div>
                <a href="{{ route('register') }}" >
                    Don't have an account yet?
                </a>

                <x-ui.button type="submit" style="success">
                    <x-slot:icon>
                        <i class="fa fa-check"></i>
                    </x-slot:icon>

                    Login
                </x-ui.button>
            </div>

        </x-layout.form>
    </x-layout.box>

</div>

@section('content')

@endsection
