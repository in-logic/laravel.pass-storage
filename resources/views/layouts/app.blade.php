<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
    <!-- Styles -->
    @yield('stlyle')

    @livewireStyles

    @vite('resources/css/app.css')

    <!-- Scripts -->
    @yield('scripts')

    @livewireScripts

    <title>PSSWD: @yield('title', 'Your password manager')</title>
</head>
  <body>

    <header class="flex justify-between bg-gray-100">
        <h1>PSSWD</h1>
        <nav>
            <a href="{{ route('logout') }}">Logout</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

  </body>
</html>
