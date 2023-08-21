<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AllowanceData extends Model {
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'allowance_id', 'employee_id','gross_salary' ];

    public function allowance(): BelongsTo {
        return $this->belongsTo(Allowance::class);
    }

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
