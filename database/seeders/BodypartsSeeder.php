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
            ['icon' => 'images/bodyParts/waist.png'],
            ['icon' => 'images/bodyParts/chest.png'],
            ['icon' => 'images/bodyParts/biceps.png'],
            ['icon' => 'images/bodyParts/forearm.png'],
            ['icon' => 'images/bodyParts/shoulders.png'],
            ['icon' => 'images/bodyParts/hips.png'],
            ['icon' => 'images/bodyParts/leg.png'],
            ['icon' => 'images/bodyParts/calves.png'],
            ['icon' => 'images/bodyParts/neck.png'],
        ];
        foreach ($bodyparts as $bodypart) {
            BodyPart::create($bodypart);
        }
    }
}
