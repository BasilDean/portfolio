<?php

namespace Database\Seeders;

use App\Models\gymTracker\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [
            ['icon' => 'images/equipment/barbell.png'],
            ['icon' => 'images/equipment/dumbbell.png'],
            ['icon' => 'images/equipment/gears.png'],
        ];
        foreach ($equipments as $equipment) {
            Equipment::create($equipment);
        }
    }
}
