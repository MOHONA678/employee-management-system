<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'time_in', 'time_out' ];

    public function employees(): HasMany {
        return $this->hasMany(Employee::class);
    }
    
}
