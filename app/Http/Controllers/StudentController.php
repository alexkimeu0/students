<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $students = Student::all();
        return view('student.details', compact('students'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'student_id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);

        $student = new Student;

        $student->student_id = $request->input('student_id');
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->save();

        return redirect('/student')->with('success', 'Student Registered successfully!');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit-student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);

        $student = Student::find($id);

        $student->student_id = $request->input('student_id');
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');

        $student->save();

        return redirect('/student')->with('success', 'Student Details Updated!');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student')->with('success', 'Student Deleted Successfully!');
    }
}
