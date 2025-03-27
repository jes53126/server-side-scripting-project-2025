<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
        // Display a listing of the students
        public function index(Request $request)
        {
            $colleges = College::all();
            $students = Student::query();
    
            if ($request->has('college_id')) {
                $students->where('college_id', $request->college_id);
            }
    
            $students = $students->get();
            return view('students.index', compact('students', 'colleges'));
        }
    
        // Show the form for creating a new student
        public function create()
        {
            $colleges = College::all();
            return view('students.create', compact('colleges'));
        }
    
        // Store a newly created student in storage
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:students',
                'phone' => 'required|regex:/^[0-9]{8}$/',
                'dob' => 'required|date',
                'college_id' => 'required|exists:colleges,id',
            ]);
    
            Student::create($request->all());
    
            return redirect()->route('students.index')->with('success', 'Student created successfully!');
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

     // Show the form for editing the specified student
     public function edit(Student $student)
     {
         $colleges = College::all();
         return view('students.edit', compact('student', 'colleges'));
     }
 
     // Update the specified student in storage
     public function update(Request $request, Student $student)
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:students,email,' . $student->id,
             'phone' => 'required|regex:/^[0-9]{8}$/',
             'dob' => 'required|date',
             'college_id' => 'required|exists:colleges,id',
         ]);
 
         $student->update($request->all());
 
         return redirect()->route('students.index')->with('success', 'Student updated successfully!');
     }
 
     // Remove the specified student from storage
     public function destroy(Student $student)
     {
         $student->delete();
 
         return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
     }
 }

 ?>