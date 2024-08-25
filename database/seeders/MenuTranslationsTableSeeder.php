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
        ];

        foreach ($menuTranslations as $menuTranslation) {
            MenuTranslation::create($menuTranslation);
        }
    }
}
