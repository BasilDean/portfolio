<?php

namespace App\Models\gymTracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyPart extends Model
{
    use HasFactory;
    protected $table = 'gym_tracker_body_parts';
    protected $fillable = [
        'icon'
    ];

    public function measurements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Measurement::class);
    }
    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(related: BodypartTranslation::class);
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

//    public function setTranslation($locales, $title)
//    {
//
//    }
}
