<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Allowance extends Model {
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'year', 'month' ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }

    public function allowanceData(): HasMany {
        return $this->hasMany(AllowanceData::class);
    }
}
