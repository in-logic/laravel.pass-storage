@extends('layouts.guest')

@section('title', 'Login')
<div class="flex items-center justify-center w-full h-full">

    <x-layout.form
        action="{{ route('login.post') }}"
        class="flex flex-col gap-5"
    >
        <x-ui.input
            type="email"
            placeholder="jhon.doe@example.com"
            label="Email"
            name="email"
        />

        <x-ui.input
            type="password"
            placeholder="*************"
            label="Password"
            name="password"
        />

        <hr>

        <div>
            <a href="{{ route('register') }}" class="text-xs text-gray-500">
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

</div>

@section('content')

@endsection
