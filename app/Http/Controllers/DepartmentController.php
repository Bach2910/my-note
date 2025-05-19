<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $department = Department::with('classes')->get();
        return view('department.index', compact('department'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:departments,code',
        ]);
        Department::create($validate);
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $department = Department::with('classes')->findOrFail($id);
        return view('department.detail', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $department = Department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $department = Department::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:departments,code,' . $id,
        ]);
        $department->update($validate);
        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
