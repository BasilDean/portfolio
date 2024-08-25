<?php

namespace Database\Seeders;

use App\Models\gymTracker\BodyPart;
use Illuminate\Database\Seeder;

class BodypartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodyparts = [
            ['icon' => 'images/bodyParts/height.png'],
            ['icon' => 'images/bodyParts/weight.png'],
            ['icon' => 'images/bodyParts/bodyfat.png'],
        ];



        foreach ($bodyparts as $bodypart) {
            BodyPart::create($bodypart);
        }
    }
}
