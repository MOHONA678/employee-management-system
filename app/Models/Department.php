<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'title', 'description', 'status' ];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
    
    // Many

    // One to Many
}
