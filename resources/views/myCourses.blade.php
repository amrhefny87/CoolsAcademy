@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-special2">
                <div class="container-fluid d-flex flex-wrap justify-content-around">
                    @foreach ($courses_users as $myCourse)
                    {{-- @if ($id == $courses_users->user_id) --}}
                    <div class="card-special mb-5 mt-5" style="width: 18rem;">
                        <img src="{{ $myCourse->image }}" class="card-img-top p-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $myCourse->course_name }}</h5>
                            <p class="card-text"><small class="text-muted">{{ $myCourse->num_max }}</small></p>
                            <p class="card-text"><small class="text-muted">{{ $myCourse->date }}</small></p>
                            <p class="card-text">{{ $myCourse->description }}</p>
                            @if (Auth::check())
            <!--Aquí va un if --><a href="{{ route('unsubscribe', ["id"=>$myCourse->id]) }}" class="button-inscribe btn btn-success">Unsubscription</a>
                                @endif
                            <a href="#" class="btn btn-primary">More info</a>
                        </div>
                    </div>
                    {{-- @endif --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection