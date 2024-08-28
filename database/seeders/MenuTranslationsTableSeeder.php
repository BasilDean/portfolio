<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuTranslation;

class MenuTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuTranslations = [
            ['menu_id' => 1, 'locale' => 'en', 'name' => 'Home'],
            ['menu_id' => 1, 'locale' => 'ru', 'name' => 'Главная'],
            ['menu_id' => 2, 'locale' => 'en', 'name' => 'Dashboard'],
            ['menu_id' => 2, 'locale' => 'ru', 'name' => 'Панель управления'],
            ['menu_id' => 3, 'locale' => 'en', 'name' => 'Contact'],
            ['menu_id' => 3, 'locale' => 'ru', 'name' => 'Контакты'],
            ['menu_id' => 4, 'locale' => 'en', 'name' => 'Gym tracker'],
            ['menu_id' => 4, 'locale' => 'ru', 'name' => 'Gym tracker'],
            ['menu_id' => 5, 'locale' => 'en', 'name' => 'Parameters'],
            ['menu_id' => 5, 'locale' => 'ru', 'name' => 'Параметры'],
        ];

        foreach ($menuTranslations as $menuTranslation) {
            MenuTranslation::create($menuTranslation);
        }
    }
}
