<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'basic',
        'house_rent',
        'medical',
        'transport',
        'phone_bill',
        'internet_bill',
        'special',
        // 'bonus',
        'overtime_pay',
        'provident_fund',
        // 'advance',
        'income_tax',
        'health_insurance',
        'life_insurance'
        // Add other fields here
    ];

    // Define relationships
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

}
