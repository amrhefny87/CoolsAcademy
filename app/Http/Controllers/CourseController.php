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
        $sliderCourses = Course::where('favorite', true)->orderByDesc('created_at')->take(6)->get();
        $courses =Course::all()->sortBy('date');

        return view('welcome', ['sliderCourses'=>$sliderCourses, 'courses'=>$courses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $sliderCourses = Course::where('favorite', true)->orderByDesc('created_at')->take(6)->get();
        $courses =Course::all()->sortBy('date');
        return view('home', ['sliderCourses'=>$sliderCourses, 'courses'=>$courses]);
    }
    
    public function myCourses()
    {
        $user =Auth::user();
        $courses = $user->courses;
        return view('myCourses', ['courses_users'=>$courses]);
        
    }

    public function subscribe($id) 
    {
        $user =User::find(Auth::id());
        // $courses = $user->courses;
        $course=Course::find($id);
        if (!$user->isSubscribed($course)){
            $user->subscribeTo($course);
            $this->sendEmail();
        }

        return redirect()->route('myCourses');

    }

    public function unsubscribe($id)
    {
        
        $user =User::find(Auth::id());
        $course_id=Course::find($id);
        $user->courses()->detach($course_id);
        return redirect()->route('myCourses');
    
    }

    public function sendEmail()
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
            "hour"=>$request->hour,
            "course_link"=>$request->course_link,
            "num_max"=>$request->num_max,
            "favorite"=>$request->has('favorite'),
            "description"=>$request->description
        ]);
        $course->save();
        return redirect()->route('home');//->with('message',"The course has been created successfully");
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::find($id);
        return view('show', compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::find($id);
        return view ('edit', compact('course'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $course = Course::whereId($id);
    
        $course->update([
            "course_name"=>$request->course_name,
            "image"=>$request->image,
            "date"=>$request->date,
            "hour"=>$request->hour,
            "course_link"=>$request->course_link,
            "num_max"=>$request->num_max,
            "favorite"=>$request->has('favorite'),
            "description"=>$request->description
        ]);

        return redirect()->route('home');//->with('message',"The course has been update successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('home')//->with('message',"The course has been created successfully");
        ;
    }
}


