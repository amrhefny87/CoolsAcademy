<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Course as CourseResources;

use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'test';
        $courses = Course::all();
        return ($courses);
        //return(CourseResources::collection($courses));
        //$sliderCourses = Course::where('favorite', true)->orderByDesc('created_at')->take(6)->get();
        //$courses =Course::all()->sortByDesc('date');

        //return view('welcome', ['sliderCourses'=>$sliderCourses, 'courses'=>$courses]);
    }

    public function subscribers($id)
    {
        $course = Course::find($id);
        $subscribers = $course->users;
        return response()->json($subscribers, 200);

    }

    
}


