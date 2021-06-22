@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-special2">
                <div class="card-header">Edit Course</div>

                <div class="card-body">
                    <form method="POST" action="{{route('update', $course->id)}}">     
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="course_name" class="col-md-4 col-form-label text-md-right">Course Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="course_name" value="{{$course->course_name}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image url</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control " name="image" value="{{$course->image}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date (yyyy-mm-dd)</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="date" value="{{$course->date}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hour" class="col-md-4 col-form-label text-md-right">Hour</label>
                            
                            <div class="col-md-6">
                                <input  type="appt-time" class="form-control" value="{{$course->hour}}" name="hour" min="00:00:00" max=“23:59:59” required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_link" class="col-md-4 col-form-label text-md-right">Course Link</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" value="{{$course->course_link}}" name="course_link" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_max" class="col-md-4 col-form-label text-md-right">Num Max</label>

                            <div class="col-md-6">
                                <input  type="number" class="form-control" value="{{$course->num_max}}" name="num_max" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="switch" for="favorite">
                                Favorite
                            </label>
                            @if ($course->favorite==true)
                                <input type="checkbox"  name="favorite" checked>
                            @else
                                <input type="checkbox"  name="favorite">
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$course->description}}" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button-info btn btn-primary">
                                    Update Course
                                </button>
                                <button type="submit" class="button-info btn btn-danger">
                                    Cancel
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

