<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        $exams = Exam::all();
        return view('student.exam', compact('exams'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'student_id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'date' => 'date|required'
        ]);

        $exam = new Exam;

        $exam->student_id = $request->input('student_id');
        $exam->firstName = $request->input('firstName');
        $exam->lastName = $request->input('lastName');
        $exam->date = $request->input('date');
        $exam->save();

        return redirect('/exam')->with('success', 'Exam Registered successfully!');
    }

    public function edit($id){
        $exam = Exam::findOrFail($id);
        return view('student.edit-exam', compact('exam'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'date' => 'required|date'
        ]);

        $exam = Exam::find($id);

        $exam->student_id = $request->input('student_id');
        $exam->firstName = $request->input('firstName');
        $exam->lastName = $request->input('lastName');
        $exam->date = $request->input('date');
        $exam->save();

        return redirect('/exam')->with('success', 'Exam Updated!');
    }

    public function destroy($id){
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect('/exam')->with('success', 'Exam Deleted Successfully!');
        }
}
