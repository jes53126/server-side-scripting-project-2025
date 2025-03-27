<?php
namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    // Display a listing of the colleges
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    // Show the form for creating a new college
    public function create()
    {
        return view('colleges.create');
    }

    // Store a newly created college in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges',
            'address' => 'required',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College created successfully!');
    }

    // Show the form for editing the specified college
    public function edit(College $college)
    {
        return view('colleges.edit', compact('college'));
    }

    // Update the specified college in storage
    public function update(Request $request, College $college)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college->id,
            'address' => 'required',
        ]);

        $college->update($request->all());

        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }

    // Remove the specified college from storage
    public function destroy(College $college)
    {
        $college->delete();

        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }
}

?>