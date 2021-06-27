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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- SWipe JS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
    <div>
    
        
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <img src="{{asset('img/logo.png')}}" class="mt-2">
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item text-white">
                                <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item text-white">
                                <a class="nav-link text-white" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item text-white mt-2">
                            <a href="{{ url('/home') }}" class="text-sm text-white underline">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" 
                                style="background-color: rgba(0, 0, 0, 0.5);color: #fff;" 
                                aria-labelledby="navbarDropdown">

                                <a class="dropdown-item text-white" href="{{ route('logout') }}"
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
        </nav>
    </div>
        




        <main class="py-4">
            @yield('content')
            @yield('welcome')
            @yield('show')
            
        </main>
        <footer class="footer sticky-bottom bg-dark text-white" style="max-height: 22%" >
            <div class="d-flex align-items-center flex-column">
            <h3 class="justify-content-center">Contact Us</h3>
            <div>
            

            <a id="phoneDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{asset('img/phone.png')}}" class="mr-1" style="max-width: 40px;">
            </a>

                <p class="dropdown-menu dropdown-menu-center text-white" 
                    style="background-color: rgba(0, 0, 0, 0.5);color: #fff;"
                    aria-labelledby="phoneDropdown">666000000</p>

            <a class="mailto" href="mailto:contact@test.com">
                <img src="{{asset('img/email.png')}}" class="mt-1" style="max-width: 30px;">
            </a>
            
            <a href="https://www.google.com/maps/dir/41.3907372,2.1745004/google+map+factoria+f5/@41.3948965,2.1600008,15z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x12a4a3269e417c55:0xb436628565250d66!2m2!1d2.1634741!2d41.3987552" target="_blank">
                <img src="{{asset('img/location.png')}}" style="max-width: 25px;">
            </a>

            </div>
            <div class="ml-auto p-2 ">
                <p><small> Copyrights @ Coolders</small></p>
            </div>
            </div>
            
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="../../public/resources/js/sendEmail.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   

</body>
</html>
