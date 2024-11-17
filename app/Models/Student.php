<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; 
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'enrollment_date',
    ];

    protected $dates = [
        'date_of_birth',
        'enrollment_date',
    ];
}
