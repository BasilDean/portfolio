<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodypartTranslation extends Model
{
    use HasFactory;
    protected $table = 'gym_tracker_body_part_translations';
    protected $fillable = [
        'body_part_id',
        'locale',
        'title',
    ];

    public function bodypart(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BodyPart::class);
    }
}
