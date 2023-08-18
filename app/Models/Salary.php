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
        'transport',
        'special',
        'bonus',
        'overtime_pay',
        'provident_funt',
        'advance',
        'tax'


        // Add other fields here
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
