<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
