<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Muscle extends Model
{
    
    // use HasFactory;
    protected $table = 'muscles';
    public $timestamps = false;
    protected $hidden = ['pivot'];
    protected $fillable = [
        'name'
    ];

    public function exercises(): BelongsToMany {
        return $this->belongsToMany(Exercise::class);
    }
}
