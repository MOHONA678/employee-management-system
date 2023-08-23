<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class LateTime extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'latetime_duration', 'latetime_date'];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
