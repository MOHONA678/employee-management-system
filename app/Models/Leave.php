<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
        // $leave = Leave::find(1);
        // $employee = $leave->employee;
    }
  

}
