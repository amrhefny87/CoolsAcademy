<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\WelcomeToCourseMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses =Course::all();
        //dd($courses);
        return view('welcome')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $courses =Course::all();
        return view('home')->with('courses',$courses);
    }
    
    public function myCourses()
    {
        $user =Auth::user();
        $courses = $user->courses;
        //dd($courses);
        return view('myCourses', ['courses_users'=>$courses]);
        
    }

    public function subscribe($id)
    {
        $user =User::find(Auth::id());
        //$user =Auth::user();
        $course_id=Course::find($id);
        //dd($user->courses);
        $user->courses()->attach($course_id);
        $this->sendEmail();
        return redirect()->route('myCourses');
    
    }

    public function unsubscribe($id)
    {
        
        $user =User::find(Auth::id());
        $course_id=Course::find($id);
        //dd($user->courses);
        $user->courses()->detach($course_id);
        return redirect()->route('myCourses');
    
    }

    public function sendEmail ()
    {
        $correo = new WelcomeToCourseMailable;

        Mail::to("cooldersversion2@gmail.com")->send($correo);
        
        return redirect()->route('myCourses');
        
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
            "course_name"=>$request->course_name,
            "image"=>$request->image,
            "date"=>$request->date,
            "num_max"=>$request->num_max,
            "description"=>$request->description
        ]);
        $course->save();
        return redirect()->route('home')//->with('message',"The course has been created successfully");
        ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

//public function bookEvent($user_id, $id){

    //$user = User::find($user_id);
   // $event = Events::find($id);

   // $user->EventsBookedIn()->attach($event->id);
//}
//public function CancelbookedEvent($user_id, $id){

    //$user = User::find($user_id);
    //$event = Events::find($id);

    //$user->EventsBookedIn()->detach($event->id);
//}

//}
