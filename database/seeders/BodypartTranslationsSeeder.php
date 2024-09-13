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
            ['body_part_id' => 3, 'locale' => 'en', 'title' => 'Body fat'],
            ['body_part_id' => 3, 'locale' => 'ru', 'title' => 'Процент жира в организме'],
            ['body_part_id' => 4, 'locale' => 'en', 'title' => 'Waist'],
            ['body_part_id' => 4, 'locale' => 'ru', 'title' => 'Талия'],
            ['body_part_id' => 5, 'locale' => 'en', 'title' => 'Chest'],
            ['body_part_id' => 5, 'locale' => 'ru', 'title' => 'Грудь'],
            ['body_part_id' => 6, 'locale' => 'en', 'title' => 'Biceps'],
            ['body_part_id' => 6, 'locale' => 'ru', 'title' => 'Бицепс'],
            ['body_part_id' => 7, 'locale' => 'en', 'title' => 'Forearms'],
            ['body_part_id' => 7, 'locale' => 'ru', 'title' => 'Предплечье'],
            ['body_part_id' => 8, 'locale' => 'en', 'title' => 'Shoulders'],
            ['body_part_id' => 8, 'locale' => 'ru', 'title' => 'Плечи'],
            ['body_part_id' => 9, 'locale' => 'en', 'title' => 'Hips'],
            ['body_part_id' => 9, 'locale' => 'ru', 'title' => 'Бедра'],
            ['body_part_id' => 10, 'locale' => 'en', 'title' => 'Thighs'],
            ['body_part_id' => 10, 'locale' => 'ru', 'title' => 'Обхват бедра'],
            ['body_part_id' => 11, 'locale' => 'en', 'title' => 'Calves'],
            ['body_part_id' => 11, 'locale' => 'ru', 'title' => 'Икры'],
            ['body_part_id' => 12, 'locale' => 'en', 'title' => 'Neck'],
            ['body_part_id' => 12, 'locale' => 'ru', 'title' => 'Шея'],
        ];



        foreach ($bodypartTranslations as $bodypartTranslation) {
            BodypartTranslation::create($bodypartTranslation);
        }
    }
}
