<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentTranslation extends Model
{
    use HasFactory;
    protected $table = 'gym_tracker_equipment_translation';

    protected $fillable = [
        'equipment_id',
        'locale',
        'title',
    ];

    public function equipment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }
}
