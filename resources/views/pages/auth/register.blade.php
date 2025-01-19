@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <x-layout.form 
        action="{{ route('register.post') }}"
        class="flex flex-col gap-5 w-full p-2 sm:w-[500px] rounded-md bg-white shadow-lg mt-[30vh]"
    >
        <x-ui.input
            type="text"
            placeholder="username"
            label="Username"
            name="username"
        />

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

        <div>
            <a href="{{ route('login') }}" >
                Already have an account?
            </a>

            <x-ui.button type="submit" :style="'success'">
                <x-slot:icon>
                    <i class="fa fa-check"></i>
                </x-slot:icon>

                Register
            </x-ui.button>
        </div>

    </x-layout.form>
@endsection
