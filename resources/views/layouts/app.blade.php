<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- Bootstrap 5 Alpha --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    {{-- My styles --}}
    <link rel="stylesheet" href="css/styles.scss">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-main shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{asset('images/logo.png')}}" width="120" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        
        <main class="">
            <!-- Logo -->
            {{-- <nav class="navbar navbar-light bg-main">
                <div class="container p-4">
                    <a class="navbar-brand m-auto" href="#">
                        <img src="{{asset('images/logo.png')}}" width="120" alt="" loading="lazy">
                    </a>
                </div>
            </nav> --}}

            @yield('content')

            <!-- Footer -->
            <footer class="container-fluid bg-main">
                <div class="row text-center p-4">
                    <div class="mb-3">
                        <img src="{{asset('images/logo.png')}}" alt="YouDevs logo" width="120" id="logofooter">
                    </div>
                    <div id="col-md-10">
                        <a href="https://www.facebook.com/youdevs">
                            <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="40px" alt="facebook youdevs">
                        </a>
                        <a href="https://www.instagram.com/youdevs">
                            <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="40px" alt="instagram youdevs">
                        </a>
                        <a href="https://www.youtube.com/c/YouDevsOficial">
                            <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="40px" alt="youtube youdevs">
                        </a>
                        <p class="mt-3">Copyright © 2020 YouDevs, Blog. <br> Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </main>

    </div>

    {{-- Bootstrap 5 Alpha --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>
</html>
