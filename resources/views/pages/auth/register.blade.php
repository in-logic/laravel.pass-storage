@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div>

    <x-layout.box>
        <x-layout.form action="{{ route('register.post') }}">
            @csrf

            <x-ui.input
                type="text"
                placeholder="username"
                label="Username"
                name="username"
            />

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
                <a href="{{ route('login') }}" >
                    Already have an account?
                </a>

                <x-ui.button type="submit" style="success">
                    <x-slot:icon>
                        <i class="fa fa-check"></i>
                    </x-slot:icon>

                    Register
                </x-ui.button>
            </div>

        </x-layout.form>
    </x-layout.box>

</div>
@endsection
