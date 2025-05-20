<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $table = 'classrooms';
    protected $fillable = ['department_id', 'name','course_year','class_code','max_students'];

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
