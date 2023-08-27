<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic',
        'house_rent',
        'medical',
        'gross_salary',
        'deduction',
        'net_salary',
    ];
    // Define relationships
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
