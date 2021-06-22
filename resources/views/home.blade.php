@extends('layouts.app')
@section('content2')
@include('welcome')


@endsection
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-special2">
            

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



