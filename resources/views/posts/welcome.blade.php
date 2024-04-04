<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">

        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>

    <body>
        <div  class="welcome_container">
            <div class="welcome_logo">
                {{-- <p>TO<br>DO</p> --}}
                <img src="{{ asset('image/newlogo1.png') }}" alt="Logo" class="logo" style="width: 200px; height: auto;">
            </div>

            <div class="welcome_login">
                {{-- @if (Route::has('login')) --}}
                {{-- <div> --}}
                    <div>
                        <a href="{{ route('login') }}">Log in →</a>
                    </div>
                    <div>
                        <a href="{{ route('register') }}">Register →</a>
                    </div>    
                            {{-- @if (Route::has('register')) --}}
                            {{-- @endif --}}
                    {{-- </div> --}}
                {{-- @endif --}}
            </div>

        </div>
        
    </body>
</html>
