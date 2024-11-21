@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>
        Welcome, {{ $user->username }}!
    </h1>

    <div>
        <a href="{{ route('logout') }}">Logout</a>

        <section>
            <h2>Passwords</h2>
            <x-input type="text" placeholder="Search" label="Search" name="search" />

            <div>
                @if (count($passwords) > 0)

                    @foreach ($passwords as $password)
                        <div>
                            <h3>{{ $password->password_text }}</h3>
                            <p>{{ $password->password_obs }}</p>
                        </div>
                    @endforeach

                @else
                    <p>No passwords found.</p>
                @endif
            </div>
        </section>
    </div>

    <div>

        <span class="flex items-center">
            <i class="fa fa-plus">
            </i>
        </span>

    </div>
@endsection
