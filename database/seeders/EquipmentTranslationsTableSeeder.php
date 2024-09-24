<?php

namespace Database\Seeders;

use App\Models\gymTracker\Equipment;
use App\Models\gymTracker\EquipmentTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [
            ['equipment_id' => 1, 'locale' => 'en', 'title' => 'Barbell'],
            ['equipment_id' => 1, 'locale' => 'ru', 'title' => 'Штанга'],
            ['equipment_id' => 2, 'locale' => 'en', 'title' => 'Dumbbells'],
            ['equipment_id' => 2, 'locale' => 'ru', 'title' => 'Гантели'],
            ['equipment_id' => 3, 'locale' => 'en', 'title' => 'Machine'],
            ['equipment_id' => 3, 'locale' => 'ru', 'title' => 'Тренажер']
        ];

        foreach ($equipments as $equipment) {
            EquipmentTranslation::create($equipment);
        }
    }
}
