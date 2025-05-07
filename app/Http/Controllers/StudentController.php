<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::with('classes')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('students.add', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'student_id' => 'required|unique:students,student_id',
            'gender' => 'required:in:male,female',
            'image.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'class_id' => 'required',
        ]);
        $destinationPath = public_path('uploads');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true); // Tạo thư mục với quyền truy cập
        }
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->move($destinationPath, $imageName);
                    $imagePaths[] = 'uploads/' . $imageName; // Thêm đường dẫn vào mảng
                }
            }
        }
        $validate['image'] = implode(',', $imagePaths);
        Student::create($validate);
        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công');
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
        $student = Student::findOrFail($id);
        $classes = Classes::all();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'student_id' => 'required|unique:students,student_id,' . $id,
            'gender' => 'required|in:male,female',
            'image.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'class_id' => 'required',
        ]);

        $destinationPath = public_path('uploads');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true);
        }

        // Xử lý tệp tin hình ảnh
        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->move($destinationPath, $imageName);
                    $imagePaths[] = 'uploads/' . $imageName; // Thêm đường dẫn vào mảng
                }
            }
            $validate['image'] = implode(',', $imagePaths);
        } else {
            $validate['image'] = $student->image;
        }

        $student->update($validate);
        return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công');
    }
}
