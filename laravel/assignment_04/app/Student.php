<?php

namespace App;

use App\Major;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['first_name','last_name','email','phone','address','major_id'];

    public function major()
    {
       return $this->belongsTo(Major::class);
    }
}
