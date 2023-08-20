<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date',
        'hours_worked',
    ];

    // Define relationships
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
