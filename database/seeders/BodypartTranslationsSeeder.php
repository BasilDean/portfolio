<?php

namespace Database\Seeders;

use App\Models\gymTracker\BodypartTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodypartTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodypartTranslations = [
            ['body_part_id' => 1, 'locale' => 'en', 'title' => 'Height'],
            ['body_part_id' => 1, 'locale' => 'ru', 'title' => 'Рост'],
            ['body_part_id' => 2, 'locale' => 'en', 'title' => 'Weight'],
            ['body_part_id' => 2, 'locale' => 'ru', 'title' => 'Вec'],
            ['body_part_id' => 3, 'locale' => 'en', 'title' => 'Body fat '],
            ['body_part_id' => 3, 'locale' => 'ru', 'title' => 'Процент жира в организме'],
        ];



        foreach ($bodypartTranslations as $bodypartTranslation) {
            BodypartTranslation::create($bodypartTranslation);
        }
    }
}
