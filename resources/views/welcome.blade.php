@extends('layouts.app')



<body>
    <div>
        
    </div>
    @section('welcome')
    
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-2 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block float-right mr-5">

                @auth

                    
                    @if (Auth::user()->is_admin)
                    <a href="{{route('create')}}" class="button-info btn btn-success">Create course</a>
                    @else
                    <a href="{{ route('myCourses') }}" class="text-sm text-white underline">My Courses</a>
                    @endif
                @endauth

                

            </div>
        @endif
    </div>
   
    <!--<div class="slider float-center">-->

        <div class="container-md p-5">
            <div class="swiper-container float-center">
                <div class="swiper-wrapper">
                    @foreach ($courses as $course)
                        @if ($course->favorite)
                            <div class="swiper-slide">
                                <img src="{{$course->image}}" class="card-img-top p-2" alt="...">
                        
                            </div>
                        @endif
                    @endforeach

                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    <!--</div>-->

    <!-- Card of the Coursed -->
        <div class="container-md p-5">
            
                <div class="container-fluid d-flex flex-wrap justify-content-around">
                    @foreach ($courses as $course)
                        <div class=" mb-5 shadow-lg card-special" style="width: 18rem;">
                            <img src="{{ $course->image }}" class="card-img-top p-2" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text"><small class="text-white">{{$course->inscritos()}} de {{ $course->num_max }}</small></p>
                                <p class="card-text"><small class="text-white">{{ $course->date }}</small></p>
                                <p class="card-text">{{ $course->description }}</p>
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{route('edit',  ["id"=>$course->id])}}" class="button-info btn btn-warning">Edit course</a>
                                        <a href="{{route('delete',  ["id"=>$course->id])}}" class="button-info btn btn-danger">delete course</a>
                                      
                                                 
                              
                                    @endif
                                    
                                @endauth
                                @auth
                                @if (!$course->isFull()) 
                                    @if (Auth::user()->isSubscribed($course)) 
                                        <a href="{{ route('unsubscribe',["id"=>$course->id])}}" class="button-inscribe btn btn-success">Unsubscribe</a>
                                    @else               
                                        <a href="{{ route('subscribe',["id"=>$course->id])}}" class="button-inscribe btn btn-success">Inscription</a>
                                    @endif
                                @else
                                    @if (Auth::user()->isSubscribed($course)) 
                                        <a href="{{ route('unsubscribe',["id"=>$course->id])}}" class="button-inscribe btn btn-success">Unsubscribe</a>
                                    @else   
                                        <a class="button-inscribe btn btn-danger">Course is Full</a>
                                    @endif
                                @endif
                                @endauth
                                @if (Auth::user()==null)  
                                <a href="{{ route('subscribe',["id"=>$course->id])}}" class="button-inscribe btn btn-success">Inscription</a>
                                @endif
                                <a href="{{route('show',  ["id"=>$course->id])}}" class="button-info btn btn-primary">More info</a>

                            </div>
                            
                        </div>
                    @endforeach
                </div>
            
        </div>
    </div>
    <!--End Div of Cards of the courses-->

    
    </div>
    </div>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
        });
    </script>

    @endsection
</body>


</html>
