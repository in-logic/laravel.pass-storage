<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    @yield('stlyle')

    @vite('resources/css/app.css')

    <!-- Scripts -->
    @yield('scripts')

    <title>PSSWD: @yield('title', 'Your password manager')</title>
</head>
  <body>
    @yield('content')
  </body>
</html>
