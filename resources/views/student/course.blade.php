@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Course Registration</h1>
        </div>
        <div class="details">
            <div class="form">
                <form action="/course" method="POST">
                    @csrf
                    <input type="text" name="course_id" placeholder="Course ID..." />
                    <input type="text" name="courseName" placeholder="Course Name..." />
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="info">
                <h1>Registered courses</h1>
                <table>
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->course_id}}</td>
                        <td>{{$course->courseName}}</td>    
                        <td>
                            <a href="/course/{{$course->id}}/edit">
                                <i class="fas fa-edit"></i>
                                edit
                            </a>
                            <form action="/course/{{$course->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fas fa-trash"></i></button>
                            </form>
                        </td> 
                    </tr>                        
                    @endforeach
                </table>
            </div>

        </div>
        
    @endsection    
   