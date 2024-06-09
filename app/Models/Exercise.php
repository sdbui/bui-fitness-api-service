<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'category',
        'name',
        'target_muscle_group',
        'exercise_type',
        'equipment_required',
        'mechanics',
        'force_type',
        'experience_level',
        'secondary_muscles',
        'url'
    ];
}
