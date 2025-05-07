<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Classes::all();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('classes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required|unique:classes,name',
            'description' => 'required',
        ]);
        Classes::create($validate);
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $classes = Classes::findOrFail($id);
        return view('classes.edit', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $classes = Classes::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|unique:classes,name,' . $classes->id,
            'description' => 'required',
        ]);
        $classes->update($validate);
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classes = Classes::findOrFail($id);
        $classes->delete();
        return redirect()->route('classes.index');
    }
}
