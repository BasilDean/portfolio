<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['url' => '/', 'type' => 'public', 'group' => 'main'],
            ['url' => '/dashboard', 'type' => 'private', 'group' => 'main'],
            ['url' => '/contact', 'type' => 'public', 'group' => 'footer'],
            ['url' => '/gymtracker', 'type' => 'public', 'group' => 'gymtracker'],
            ['url' => '/gymtracker/bodyparts', 'type' => 'public', 'group' => 'gymtracker'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
