<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cro-Rec') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">


</head>
<body>
    <div id="app">
        <div class="nav fixed-top justify-content-center py-2" style="background-color:#20b2aa;">
            <nav class="navbar navbar-light fixed-top p-0 pt-4 nav-small">
                <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent" style="background-color:#004777;">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            @guest
                            <a class="nav-link nav-select text-white" href="{{ route('login') }}" style="font-family: 'Caveat', cursive; font-size:1.5em;">　{{ __('Login') }}</a>
                            @else
                            <a class="nav-link nav-select text-white" aria-current="page" href="/top" style="font-family: 'Caveat', cursive; font-size:1.5em;">　WOD</a>
                            @endguest
                        </li>
                        <li class="nav-item">
                            @guest
                            <a class="nav-link nav-select text-white" href="{{ route('register') }}" style="font-family: 'Caveat', cursive; font-size:1.5em;">　{{ __('Register') }}</a></a>
                            @else
                            <a class="nav-link nav-select text-white" href="/mypage/{{Auth::id()}}" style="font-family: 'Caveat', cursive; font-size:1.5em;">　MyPage</a>
                            @endguest
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link nav-select text-white" style="text-decoration:none; font-family: 'Caveat', cursive;font-size:1.5em;">　{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            @if((Auth::user()->id === 1))
                            <a  href="{{ route('adminCreate') }}" class="nav-link nav-select text-white" style="text-decoration:none; font-family: 'Caveat', cursive; font-size:1.5em;">　Menu</a>
                            @endif
                        </li>
                        @endauth
                    </ul>
                </nav>
            <a class="nav-link mx-auto text-center" href="/top"><img src="{{ asset('/img/logo.png ')}}" style="width:20%;"></a>
        </div>
        <div class="row" style="height:100vh">
            <div class="col-lg-2 text-center shadow text-white nav-large" style="background-color:#004777;">
                <ul class="nav flex-column pt-5"style="position:fixed; top:100px; left:40px; display:flex;">
                    <li class="nav-item">
                        @guest
                        <a class="nav-link nav-select" href="{{ route('login') }}" style="font-family: 'Caveat', cursive; font-size:1.5em;">{{ __('Login') }}</a>
                        @else
                        <a class="nav-link nav-select" aria-current="page" href="/top" style="font-family: 'Caveat', cursive; font-size:1.5em; display:block;">WOD</a>
                        @endguest
                    </li>
                    <li class="nav-item">
                        @guest
                        <a class="nav-link nav-select" href="{{ route('register') }}" style="font-family: 'Caveat', cursive; font-size:1.5em;">{{ __('Register') }}</a></a>
                        @else
                        <a class="nav-link nav-select" href="/mypage/{{Auth::id()}}" style="font-family: 'Caveat', cursive; font-size:1.5em;">MyPage</a>
                        @endguest
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link nav-select" style="text-decoration:none; font-family: 'Caveat', cursive;font-size:1.5em;">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item">
                        @if((Auth::user()->id === 1))
                        <a  href="{{ route('adminCreate') }}" class="nav-link nav-select" style="text-decoration:none; font-family: 'Caveat', cursive; font-size:1.5em;">Menu</a>
                        @endif
                    </li>
                    @endauth
                </ul>
            </div>
            <div class="py-5 col-lg-10" style="background-color:#E3E0DE; ">
                <main>
                @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>


