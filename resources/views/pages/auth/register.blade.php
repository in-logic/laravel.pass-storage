@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div>

    <x-box>
        <x-form action="{{ route('register.post') }}">
            @csrf

            <x-input
                type="text"
                placeholder="username"
                label="Username"
                name="username"
            />

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
                <a href="{{ route('login') }}" >
                    Already have an account?
                </a>

                <x-button type="submit" style="success">
                    <x-slot:icon>
                        <i class="fa fa-check"></i>
                    </x-slot:icon>

                    Register
                </x-button>
            </div>

        </x-form>
    </x-box>

</div>
@endsection
