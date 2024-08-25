<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'type',
        'group',
    ];


    public function translations()
    {
        return $this->hasMany(MenuTranslation::class);
    }

    public function getTranslation($locale)
    {
        return $this->translations->where('locale', $locale)->first();
    }

    public function getTranslatedNameAttribute()
    {
        $locale = app()->getLocale();
        $translation = $this->getTranslation($locale);

        return $translation ? $translation->name : null;
    }
}
