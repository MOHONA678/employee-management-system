<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Attendance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'employee_id', 'date', 'checkin_time', 'checkout_time', 'status' ];

    public function employee(): HasMany {
        return $this->hasMany(employee::class);
    }
    
    // Many

    // One to Many
}
