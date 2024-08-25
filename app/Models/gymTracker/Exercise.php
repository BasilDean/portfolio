<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;


    public function logs()
    {
        return $this->hasMany(Log::class);
    }


    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'exercise_equipment');
    }

    public function targetMuscles()
    {
        return $this->belongsToMany(TargetMuscle::class, 'exercise_muscle');
    }
}
