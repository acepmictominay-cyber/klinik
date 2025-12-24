<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists by email
        $admin = User::where('email', 'admin@klinik.com')->first();
        
        if (!$admin) {
            // Check if user with name 'admin' exists
            $adminByName = User::where('name', 'admin')->first();
            
            if ($adminByName) {
                // Update existing user
                $adminByName->email = 'admin@klinik.com';
                $adminByName->password = Hash::make('admin123');
                $adminByName->save();
                $admin = $adminByName;
            } else {
                // Create new admin user
                $admin = User::create([
                    'name' => 'admin',
                    'email' => 'admin@klinik.com',
                    'password' => Hash::make('admin123'),
                ]);
            }
            
            $this->command->info('Admin user created successfully!');
        } else {
            // Update existing admin user
            $admin->name = 'admin';
            $admin->password = Hash::make('admin123');
            $admin->save();
            $this->command->info('Admin user updated!');
        }
        
        $this->command->info('Username: admin');
        $this->command->info('Email: admin@klinik.com');
        $this->command->info('Password: admin123');
    }
}

