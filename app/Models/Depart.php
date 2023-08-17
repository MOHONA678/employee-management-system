<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id', 'state', 'depart_time','depart_date','type', 'status'];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
