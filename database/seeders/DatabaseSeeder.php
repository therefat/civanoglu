<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Media;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Location::factory(10)->create();
        Property::factory(50)->create();
        Media::factory(500)->create();

    }
}
