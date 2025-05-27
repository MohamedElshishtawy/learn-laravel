<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Seeder for creating users in the database.
 * This seeder uses the UserFactory which is configured to create admin users.
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creates 2 admin users using the UserFactory.
     */
    public function run(): void
    {
        // $users = User::factory(10)->make();
        User::factory(2)->create();
        User::factory(2)->admin()->create();
        
    }
}
