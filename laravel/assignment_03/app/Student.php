<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Student extends Model
{
    protected $fillable = ['first_name','last_name','email','phone','address','major_id'];
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
