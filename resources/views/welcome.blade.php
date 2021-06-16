@extends('layouts.app')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block float-right mr-5">

                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-white underline">Home</a>
                    <a href="{{ route('myCourses') }}">My Courses</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                    @endif
                @endauth

                

            </div>
        @endif

        <div class="container-md p-5">
            <div class="panel panel-default">
                <div class="panel-heading row pt-5">
                    <h2 class="text-white">Our Courses</h2>
                </div>
                <div class="container-fluid d-flex flex-wrap justify-content-around">
                    @foreach ($courses as $course)
                        <div class=" mb-5 shadow-lg card-special" style="width: 18rem; border-radius:1rem;">
                            <img src="{{ $course->image }}" class="card-img-top p-2" style="border-radius:1rem" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text"><small class="text-white">{{ $course->num_max }}</small></p>
                                <p class="card-text"><small class="text-white">{{ $course->date }}</small></p>
                                <p class="card-text">{{ $course->description }}</p>
                                            <!--Aquí va un if --><a href="{{ route('subscribe',["id"=>$course->id])}}" class="button-inscribe btn btn-success">Inscription</a>
                                <a href="" class="button-info btn btn-primary">More info</a>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!--<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
            <div class="flex items-center">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>

                <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                    Shop
                </a>

                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                    <path
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>

                <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                    Sponsor
                </a>
            </div>
        </div>

        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>-->
    </div>
    </div>
</body>

</html>
