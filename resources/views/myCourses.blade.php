@extends('layouts.app')
@section('content2')
@include('welcome')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="container-fluid d-flex flex-wrap justify-content-around">
                    @foreach ($courses as $course)
                        <div class="card mb-5" style="width: 18rem;">
                            <img src="{{ $course->image }}" class="card-img-top p-2" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $course->num_max }}</small></p>
                                <p class="card-text"><small class="text-muted">{{ $course->date }}</small></p>
                                <p class="card-text">{{ $course->description }}</p>
            <!--Aquí va un if --><a href="#" class="btn btn-success">Inscription</a>
                                <a href="#" class="btn btn-primary">More info</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



