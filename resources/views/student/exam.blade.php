@extends('students.student')
    @section('content')
        <div class="header">
            <h1>Exam Registration</h1>
        </div>

        <div class="details">
            <div class="form">
                <form action="/exam" method="POST">
                    @csrf
                    <input type="text" name="student_id" placeholder="Student ID..." />
                    <input type="text" name="firstName" placeholder="First Name..." />
                    <input type="text" name="lastName" placeholder="Last Name..." />
                    <input type="date" name="date"/>
                    <button type="submit">Submit</button>
                </form>
            </div>

            <div class="info">
                <h1>Registered Exams</h1>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Exam Date</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($exams as $exam)
                    <tr>
                        <td>{{$exam->student_id}}</td>
                        <td>{{$exam->firstName}}</td>    
                        <td>{{$exam->lastName}}</td>
                        <td>{{$exam->date}}</td>  
                        <td>
                            <a href="/exam/{{$exam->id}}/edit">
                                <i class="fas fa-edit"></i>
                                edit
                            </a>
                            <form action="/exam/{{$exam->id}}" method="POST" style="display: inline;">
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
