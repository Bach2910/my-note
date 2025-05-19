<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Student::with('classes');
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
//                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        $students = $query->orderBy('id', 'desc')->paginate(4);
        return view('students.index', compact('students', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classroom::all();
        return view('students.add', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|unique:students,phone',
            'birth_date' => 'required',
            'address' => 'required',
            'student_code' => 'required|unique:students,student_code',
            'gender' => 'required:in:male,female',
            'image.*' => 'required|nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'classroom_id' => 'required',
        ],
            [
                'full_name.required' => 'Please enter your full name',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please write the correct email format with @',
                'email.unique' => 'This email already exists',
                'address.required' => 'Please enter your address',
                'student_code.required' => 'Please enter your student id',
                'student_code.unique' => 'This student id already exists',
                'gender.required' => 'Please select your gender',
                'image.*.mimes' => 'Only jpeg, png, jpg, gif, svg files are allowed',
                'classroom_id.required' => 'Please select your class'
            ]);
        $destinationPath = public_path('uploads');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true);
        }
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->move($destinationPath, $imageName);
                    $imagePaths[] = 'uploads/' . $imageName;
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
        $student = Student::with('classes.department')->findOrFail($id);
        $classes = Classroom::all();
        return view('students.detail', compact('student','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::findOrFail($id);
        $classes = Classroom::all();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validate = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required|unique:students,phone,'.$id,
            'birth_date' => 'required',
            'address' => 'required',
            'student_code' => 'required|unique:students,student_code,'.$id,
            'gender' => 'required:in:male,female',
            'image.*' => 'required|nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'classroom_id' => 'required',
        ],
            [
                'full_name.required' => 'Please enter your full name',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please write the correct email format with @',
                'email.unique' => 'This email already exists',
                'address.required' => 'Please enter your address',
                'student_code.required' => 'Please enter your student id',
                'student_code.unique' => 'This student id already exists',
                'gender.required' => 'Please select your gender',
                'image.*.mimes' => 'Only jpeg, png, jpg, gif, svg files are allowed',
                'classroom_id.required' => 'Please select your class'
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
                    $imagePaths[] = 'uploads/' . $imageName;
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
    public function destroy(string $id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thanh cong!');
    }
}
