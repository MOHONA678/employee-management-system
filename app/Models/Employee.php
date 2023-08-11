<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'department_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'dob',
        'gender',
    ];
// Define relationships
public function user()
{
    return $this->belongsTo(User::class);
}

public function department()
{
    return $this->belongsTo(Department::class);
}
}
