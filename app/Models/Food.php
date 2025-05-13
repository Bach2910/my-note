<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_name','price','customer_id','detail'];
    public function customer()
    {

        return $this->belongsTo(Customer::class);
    }
}
