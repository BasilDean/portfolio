<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'gym_tracker_equipments';

    protected $fillable = [
        'icon'
    ];
    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(related: EquipmentTranslation::class);
    }

    public function getTranslation($locale)
    {
        return $this->translations->where('locale', $locale)->first();
    }

    public function getTranslatedTitleAttribute()
    {
        $locale = app()->getLocale();
        $translation = $this->getTranslation($locale);

        return $translation ? $translation->title : null;
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_equipment');
    }

//    public function setTranslation($locales, $title)
//    {
//
//    }
}
