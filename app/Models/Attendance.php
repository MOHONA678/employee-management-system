<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'employee_id', 'state', 'attendance_time','attendance_date','type', 'status'];

    // public function employee(): BelongsToMany {
    //     return $this->belongsToMany(Employee::class);
    // }

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
    
    // Many

    // One to Many
}
