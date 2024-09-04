<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test1',
            'email' => 'test1@test.com',
        ]);
        User::factory()->create([
            'name' => 'Test2',
            'email' => 'test2@test.com',
        ]);
    }
}
