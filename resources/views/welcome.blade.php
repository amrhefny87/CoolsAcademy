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
                    <a href="{{route('create')}}">
                        <div>
                            <img src="{{asset('img/add.png')}}" style="max-width: 40px;">
                            <p class="text-white">Create New Course</p>
                        </div>
                    </a>
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
                        @if ($course->date> now())  
                            @if ($course->favorite)
                                <div class="swiper-slide">
                                    <img src="{{$course->image}}" class="card-img-top p-2" alt="...">
                            
                                </div>
                            @endif
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
                    @if ($course->date< now())
                    <div class=" mb-5 shadow-lg card-special-grey" style="width: 18rem;">
                            <div style="height:14rem">
                            <img src="{{$course->image}}" class="card-img-top p-3" style="filter: grayscale(100%);" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $course->course_name }}</h5>
                                <p class="card-text"><small class="text-white">{{ $course->date }}</small></p>
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{route('edit',  ["id"=>$course->id])}}" >
                                            <img src="{{asset('img/edit.png')}}" style="max-width: 25px;">
                                        </a>
                                        <a href="{{route('delete',  ["id"=>$course->id])}}">
                                            <img src="{{asset('img/delete.png')}}" style="max-width: 25px;">
                                        </a>
                                    @else
                                    <a  class="ropdown-menu dropdown-menu-right underline text-white mr-2"  id="doneDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Unavailable
                                    </a>
                                        <p class="dropdown-menu dropdown-menu-right" aria-labelledby="doneDropdown">Sorry, the course is not available.</p>
                                    @endif
                                @endauth
                                
                                <a href="{{route('show',  ["id"=>$course->id])}}" class="text-white underline">More info</a>

                            </div>
                            
                        </div>
                    
                    @elseif (($course->num_max - $course->inscritos()) <= 0)
                    <div class=" mb-5 shadow-lg card-special-grey" style="width: 18rem;">
                            <div style="height:14rem">
                            <img src="{{$course->image}}" class="card-img-top p-3" style="filter: grayscale(100%);" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $course->course_name }}</h5>
                                <p class="card-text"><small class="text-danger">No places available</small></p>
                                <p class="card-text"><small class="text-white">{{ $course->date }}</small></p>
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{route('edit',  ["id"=>$course->id])}}" >
                                            <img src="{{asset('img/edit.png')}}" style="max-width: 25px;">
                                        </a>
                                        <a href="{{route('delete',  ["id"=>$course->id])}}">
                                            <img src="{{asset('img/delete.png')}}" style="max-width: 25px;">
                                        </a>
                                    @endif
                                @endauth
                                
                                @auth
                                @if (!$course->isFull()) 
                                    @if (Auth::user()->isSubscribed($course)) 
                                        <a href="{{ route('unsubscribe',["id"=>$course->id])}}" class="text-white underline">Unsubscribe</a>
                                    @else               
                                        <a href="{{ route('subscribe',["id"=>$course->id])}}" class="text-white underline">Inscribe</a>
                                    @endif
                                @else
                                    @if (Auth::user()->isSubscribed($course)) 
                                        <a href="{{ route('unsubscribe',["id"=>$course->id])}}" class="text-white underline">Unsubscribe</a>
                                    @else   
                                        <a class="text-danger">Course is Full</a>
                                    @endif
                                @endif
                                @endauth
                                <a href="{{route('show',  ["id"=>$course->id])}}" class="text-white underline">More info</a>

                            </div>
                            
                        </div>
                    @else
                    <div class=" mb-5 shadow-lg card-special" style="width: 18rem;">
                            <div style="height:14rem">
                            <img src="{{ $course->image }}" class="card-img-top p-2" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                @if (($course->num_max - $course->inscritos()) <= 0)
                                <p class="card-text"><small class="text-danger">No places available</small></p>
                                @else
                                <p class="card-text"><small class="text-white">Available places: {{$course->num_max - $course->inscritos()}}</small></p>
                                @endif
                                <p class="card-text"><small class="text-white">{{ $course->date }}</small></p>
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <a href="{{route('edit',  ["id"=>$course->id])}}" >
                                            <img src="{{asset('img/edit.png')}}" style="max-width: 25px;">
                                        </a>
                                        <a href="{{route('delete',  ["id"=>$course->id])}}">
                                            <img src="{{asset('img/delete.png')}}" style="max-width: 25px;">
                                        </a>
                                      
                                                 
                              
                                    @endif
                                    
                                @endauth
                                @auth
                                
                                    @if (Auth::user()->isSubscribed($course)) 
                                        <a href="{{ route('unsubscribe',["id"=>$course->id])}}" class="text-white underline">Unsubscribe</a>
                                    @else               
                                        <a href="{{ route('subscribe',["id"=>$course->id])}}" class="text-white underline">Inscribe</a>
                                    @endif

                                   
                             
                                @endauth
                                @if (Auth::user()==null)  
                                <a href="{{ route('subscribe',["id"=>$course->id])}}" class="mr-2 text-white underline">Inscription</a>
                                @endif
                                <a href="{{route('show',  ["id"=>$course->id])}}" class="mr-2 text-white underline">More info</a>

                            </div>
                            
                        </div>
          


                    @endif
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
