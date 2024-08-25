<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'body_part_id', 'current_size', 'goal_size'];
    public function bodyPart()
    {
        return $this->belongsTo(BodyPart::class);
    }
}
