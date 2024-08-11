<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Media;
use App\Models\Page;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

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
        $page = new Page();
        $page->name = "Contact Us";
        $page->slug = "Contact-Us";
        $page->content = "contact us";
        $page->save();
        $page->name = "About Us";
        $page->slug = "about-Us";
        $page->content = "about us";
        $page->save();

        $user = new User();
        $user->name = 'Refat Hossen';
        $user->email = 'refat@website.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('refat@website.com');
        $user->remember_token = \Illuminate\Support\Str::random(10);
        $user->save();
        Location::factory(10)->create();
        Property::factory(50)->create();
        Media::factory(500)->create();

    }
}
