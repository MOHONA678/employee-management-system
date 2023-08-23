<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'overtime_duration', 'overtime_date'];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
