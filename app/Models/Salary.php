<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'basic',
        'house_rent',
        'medical',
        // Add other fields here
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
