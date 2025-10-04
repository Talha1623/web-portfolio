<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web Development',
                'description' => 'Full-stack web applications and websites',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Ecommerce',
                'description' => 'Online stores and e-commerce platforms',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Mobile Apps',
                'description' => 'Mobile applications for iOS and Android',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'User interface and user experience design',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Laravel Projects',
                'description' => 'Projects built with Laravel framework',
                'sort_order' => 5,
                'is_active' => true
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}