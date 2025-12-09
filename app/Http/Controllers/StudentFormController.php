<?php

namespace App\Http\Controllers;

use App\Models\student_form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentFormController extends Controller
{
    // Display all student records
    public function index()
    {
        $form = student_form::where('user_id', Auth::id())->latest()->paginate(10); 
        return view("dashboard", ["form" => $form]);
    }

    public function create()
    {
        return view("student.create");
    }

    // Store a new student record in the database
    public function store(Request $request)
    {
        $request->validate([
            'sname' => 'required|string|max:255',
            'roll_number' => 'required|string|max:255', 
        ]);

        $form = new student_form();
        $form->name = $request->input('sname');
        $form->roll_number = $request->input('roll_number');
        $form->user_id = Auth::id();

        if ($form->save()) {
            return redirect()->route('dashboard')->with('success', 'Student added successfully.');
        } else {
            return redirect()->route('student.create')->with('error', 'Failed to add student.');
        }
    }

    // Display the form for editing a specific student
    public function edit($id)
    {
        $data = student_form::where('user_id', Auth::id())->findOrFail($id); 
        return view('student.edit', ['data' => $data]);
    }

    // Update the specified student record in the database
    public function update(Request $request)
    {
        $request->validate([
            'sid' => 'required|integer',
            'sname' => 'required|string|max:255',
            'roll_number' => 'required|string|max:255', 
        ]);

        $data = student_form::where('user_id', Auth::id())->findOrFail($request->input('sid')); 
        $data->name = $request->input('sname');
        $data->roll_number = $request->input('roll_number');

        if ($data->save()) {
            return redirect()->route('dashboard')->with('success', 'Student updated successfully.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Failed to update student.');
        }
    }

    // Delete the specified student record
    public function destroy($id)
    {
        $student = student_form::where('user_id', Auth::id())->findOrFail($id);
        if ($student->delete()) {
            return redirect()->route('dashboard')->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Failed to delete student.');
        }
    }
}
