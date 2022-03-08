<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'major_id',
        'date_of_birth',
        'address',
        'created_at',
        'updated_at'
    ];
    public function major(){

        return $this->belongsTo('App\Models\Major');
    }
}

