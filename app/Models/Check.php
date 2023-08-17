<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'attendance_time', 'depart_time' ];

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }
}

 
    
