<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0123456789',
            'address' => 'Thanh pho ho chi minh',

        ]);

        $this->call([
            AdminUserSeeder::class,

        ]);
    }
}
