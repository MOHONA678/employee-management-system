<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'leave_type',
        'status',
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
