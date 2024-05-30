<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'start_time',
        'end_time',
        'max_participants',
    ];

    /**
     * The users that belong to the course.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

