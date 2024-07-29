<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Muscle;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'category',
        'name',
        // 'target_muscle_group', // redundant with category...
        'exercise_type',
        'equipment_required',
        'mechanics',
        'force_type',
        'experience_level',
        // 'secondary_muscles', // many to many relationship
        'url'
    ];

    public function secondary_muscles(): BelongsToMany {
        return $this->belongsToMany(Muscle::class);
    }

    public function target_muscle(): HasOne {
        return $this->hasOne(Muscle::class);
    }
}
