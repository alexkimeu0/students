@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Student Details</h1>
        </div>

        <div class="details">
            <div class="form">
                <form action="/student" method="POST"> 
                    @csrf
                    <input type="text" name="student_id" placeholder="Student ID..." />
                    <input type="text" name="firstName" placeholder="First Name..." />
                    <input type="text" name="lastName" placeholder="Last Name..." />
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="info">
                <h1>Student Data</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->student_id}}</td>
                        <td>{{$student->firstName}}</td>    
                        <td>{{$student->lastName}}</td>   
                        <td>
                            <a href="/student/{{$student->id}}/edit" class="edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="/student/{{$student->id}}" method="POST" style="display: inline;">
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
