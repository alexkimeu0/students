<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $courses = Course::all();
        return view('student.course', compact('courses'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'course_id' => 'required',
            'courseName' => 'required',
            
        ]);

        $course = new Course;

        $course->course_id = $request->input('course_id');
        $course->courseName = $request->input('courseName');
        $course->save();

        return redirect('/course')->with('success', 'Course Registered successfully!');
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        return view('student.edit-course', compact('course'));
    }

    public function update(Request $request, $id)
    {
        

        $this->validate($request, [
            'course_id' => 'required',
            'courseName' => 'required',
        ]);

        $course = Course::find($id);

        $course->course_id = $request->input('course_id');
        $course->courseName = $request->input('courseName');

        $course->save();

        return redirect('/course')->with('success', 'Course Updated!');
    }

    public function destroy($id){
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/course')->with('success', 'Course Deleted Successfully!');
    }
}
