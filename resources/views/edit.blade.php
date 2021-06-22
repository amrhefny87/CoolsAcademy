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

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Course Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="course_name" value="{{$course->course_name}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image url</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control " name="image" value="{{$course->image}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Date (yyyy-mm-dd)</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="date" value="{{$course->date}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Num Max</label>

                            <div class="col-md-6">
                                <input  type="number" class="form-control" name="num_max" value="{{$course->num_max}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{$course->description}}">
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

