<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'student_id',
        'year',
        'description',
        'grades',
        'display',
        'images'
    ];

    public function students() 
    {     
        return $this->belongsTo(Student::class); 
    } 

}
