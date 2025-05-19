<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['full_name','email','student_code','address','gender','image','classroom_id','birth_date','phone'];
    public function classes(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
}


