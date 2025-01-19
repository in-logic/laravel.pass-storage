@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center w-full h-full">

        <x-layout.form
            action="{{ route('login.post') }}"
            class="flex flex-col gap-5 w-full p-2 sm:w-[500px] rounded-md bg-white shadow-lg mt-[30vh]"
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

            <div class="flex justify-between items-center">
                <x-ui.button type="submit" :style="'success'">
                    <x-slot:icon>
                        <i class="fa fa-check"></i>
                    </x-slot:icon>

                    Login
                </x-ui.button>
                <a href="{{ route('register') }}" class="text-xs text-gray-500 underline">
                    Don't have an account yet?
                </a>
            </div>
        </x-layout.form>

    </div>
@endsection
