@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Edit Student Details</h1>
        </div>

            <div class="form">
                <form action="/student/{{$student->id}}" method="POST" class="edit-form"> 
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{$student->student_id}}" name="student_id" placeholder="Student ID..." />
                    <input type="text" value="{{$student->firstName}}" name="firstName" placeholder="First Name..." />
                    <input type="text" value="{{$student->lastName}}" name="lastName" placeholder="Last Name..." />
                    <button type="submit">Update</button>
                </form>
            </div>
       
    @endsection    
