<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bento Box') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Bento Box') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link @if(Route::is('scheduler')) active @endif" href="{{ route('scheduler') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">{{ __('Scheduler') }}</a>
                        </li>
                        @if (Auth::user()->account_type == 'admin' || Auth::user()->account_type == 'employee' )
                            
                            <li class="nav-item">
                                <a class="nav-link @if(Route::is('transaction')) active @endif" href="{{ route('transaction') }}">{{ __('Transaction') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::is('room.index')) active @endif" href="{{ route('room.index') }}">{{ __('Rooms') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::is('rental.index')) active @endif" href="{{ route('rental.index') }}">{{ __('Rentals') }}</a>
                            </li>
                            
                            @if (Auth::user()->account_type == 'admin' )
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('user.index')) active @endif" href="{{ route('user.index') }}">{{ __('Users') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('report')) active @endif" href="{{ route('report') }}">{{ __('Report') }}</a>
                                </li>
                            @endif
                        @endif
                    @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('login')) active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('register')) active @endif" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('viewProfile')}}">
                                        {{ __('Profile') }}
                                    </a>
                                    {{-- <a href="{{route('profile.edit',$user->id)}}" class="btn btn-info updateButton" style='width: 93px; margin: 2px;'>Edit</a>  --}}

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>

        <div>
            @yield('script')
        </div>
        
    </div>
</body>

            
<footer class="footer mt-5">
  <p class="text-center">Copyright © 2021 | R - Ez Booking System</p>
</footer>

</html>
