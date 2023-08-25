<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [ 'employee_id', 'title', 'start_date','end_date', 'leave_type', 'leave_reason', 'status' ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
