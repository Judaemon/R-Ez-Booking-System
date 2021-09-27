<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <title>{{ config('app.name', 'Bento Box') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Bento Box') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="@if(Route::is('home')) active @endif nav-link">Home</a>
                    </li>
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="@if(Route::is('login')) active @endif nav-link">Login</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="@if(Route::is('register')) active @endif nav-link">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>hakdog</h1>

    </div>
</body>

<footer class="footer mt-5">
    <ul class="social d-flex justify-content-center">
        <li><a class="facebook" target="_blank" href="https://www.facebook.com">facebook</a></li>
        <li><a class="instagram" target="_blank" href="https://www.instagram.com">qwe</a></li>
        <li><a class="twitter" target="_blank" href="https://www.twitter.com">qwe</a></li>
        <li><a class="pinterest" target="_blank" href="https://www.pinterest.com">qwe</a></li>
    </ul>
    <p class="text-center">Copyright © 2021 | Judaemon</p>
</footer>

</html>
