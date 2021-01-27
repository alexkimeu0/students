@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Update Exam</h1>
        </div>

            <div class="form">
                <form action="/exam/{{$exam->id}}" method="POST" class="edit-form">
                    @csrf
                    @method('PATCH')
                    <input type="text" value="{{$exam->student_id}}" name="student_id" placeholder="Student ID..." />
                    <input type="text" value="{{$exam->firstName}}" name="firstName" placeholder="First Name..." />
                    <input type="text" value="{{$exam->lastName}}" name="lastName" placeholder="Last Name..." />
                    <input type="date" value="{{$exam->date}}" name="date"/>
                    <button type="submit">Update</button>
                </form>
            </div>        
        @endsection
