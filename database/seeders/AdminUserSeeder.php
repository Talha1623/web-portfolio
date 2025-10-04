<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create admin if it doesn't exist
            if (!User::where('email', 'admin@example.com')->exists()) {
                User::create([
                    'name' => 'Muhammad Talha',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('password'),
                    'is_admin' => true,
                    'job_title' => 'Web Developer & UI/UX Designer',
                    'location' => 'New York, USA',
                    'about_text' => "I'm a passionate Web Developer and UI/UX Designer with over 5 years of experience creating beautiful, functional, and user-centered digital experiences. I specialize in frontend development and have a keen eye for design details.\n\nMy approach combines technical expertise with creative problem-solving to deliver solutions that not only look great but also perform exceptionally well across all devices and platforms.",
                ]);
            }
    }
    }

