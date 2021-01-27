@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Update Course Details</h1>
        </div>
            <div class="form">
                <form action="/course/{{$course->id}}" method="POST" class="edit-form">
                    @csrf
                    @method('PATCH')
                    <input type="text" value="{{$course->course_id}}" name="course_id" placeholder="Course ID..." />
                    <input type="text" value="{{$course->courseName}}" name="courseName" placeholder="Course Name..." />
                    <button type="submit">Update</button>
                </form>
            </div>
        
    @endsection    
   