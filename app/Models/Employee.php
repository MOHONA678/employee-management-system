<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'user_id',
        'department_id',
        'schedule_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'dob',
        'gender',
    ];
// Define relationships
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function attendances(): HasMany {
        return $this->hasMany(Attendance::class); // Replace 'Attendance' with your actual attendance model name
    }

    public function schedule(): BelongsTo {
        return $this->belongsTo(Schedule::class); // Replace 'Attendance' with your actual attendance model name
    }

    public function departs(): HasMany {
        return $this->hasMany(Depart::class);
    }

    public function check()
    {
        return $this->hasMany(Check::class);
    }

}

