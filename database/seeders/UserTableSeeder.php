<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Symfony\Component\String\u;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'basil',
            'email' => 'vonavud@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ];
        User::create($user);
    }
}
