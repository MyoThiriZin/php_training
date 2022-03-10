<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Major extends Model
{
    protected $fillable = [
        'name',
    ];
 
    public function student()
    {
        return $this->hasMany(Student::class, 'name');
    }
}
