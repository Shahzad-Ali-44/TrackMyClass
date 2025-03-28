<?php

namespace App\Http\Controllers;

use App\Models\student_form;
use Illuminate\Http\Request;

class StudentFormController extends Controller
{
    // Display all student records
    public function index()
    {
        $form = student_form::all(); 
        return view("show", ["form" => $form]);
    }

    // Display the form for creating a new student
    public function create()
    {
        return view("index");
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

        if ($form->save()) {
            return redirect('/records')->with('success', 'Student added successfully.');
        } else {
            return redirect('/')->with('error', 'Failed to add student.');
        }
    }

    // Display the form for editing a specific student
    public function edit($id)
    {
        $data = student_form::findOrFail($id); 
        return view('edit', ['data' => $data]);
    }

    // Update the specified student record in the database
    public function update(Request $request)
    {
        $request->validate([
            'sid' => 'required|integer',
            'sname' => 'required|string|max:255',
            'roll_number' => 'required|string|max:255', 
        ]);

        $data = student_form::findOrFail($request->input('sid')); 
        $data->name = $request->input('sname');
        $data->roll_number = $request->input('roll_number');

        if ($data->save()) {
            return redirect('/records')->with('success', 'Student updated successfully.');
        } else {
            return redirect('/records')->with('error', 'Failed to update student.');
        }
    }

    // Delete the specified student record
    public function destroy($id)
    {
        if (student_form::destroy($id)) {
            return redirect('/records')->with('success', 'Student deleted successfully.');
        } else {
            return redirect('/records')->with('error', 'Failed to delete student.');
        }
    }
}
