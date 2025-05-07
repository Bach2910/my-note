<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name','email','student_id','address','gender','image','class_id'];
    public function classes(){
        return $this->belongsTo(Classes::class,'class_id');
    }
}


