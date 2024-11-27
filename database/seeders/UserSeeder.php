<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample users
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'dob' => '1990-01-01',
            'accountType' => 'admin',
            'password' => 'password123', // Hash the password for security
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'dob' => '1995-05-15',
            'accountType' => 'user',
            'password' => 'securepassword', // Hash the password for security
        ]);
    }
}
