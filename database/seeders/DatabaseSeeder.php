<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Item::factory(10)->create();
        User::factory()->create([
            'name' => 'Po Moyo',
            'email' => 'po@inventory.com',
            'password' => Hash::make('password')
        ]);
    }
}
