<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_equipment');
    }
}
