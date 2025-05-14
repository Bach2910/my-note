<?php

namespace App\Http\Requests\request;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'student_id' => 'required|unique:students,student_id,',
            'gender' => 'required|in:male,female',
            'image.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'class_id' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name',
            'email.required' => 'Please enter your email',
            'address.required' => 'Please enter your address',
            'student_id.required' => 'Please enter your student id',
            'student_id.unique' => 'This student id already exists',
            'gender.required' => 'Please select your gender',
            'image.*.mimes' => 'Only jpeg, png, jpg, gif, svg files are allowed',
            'class_id.required' => 'Please select your class'
        ];
    }
}
