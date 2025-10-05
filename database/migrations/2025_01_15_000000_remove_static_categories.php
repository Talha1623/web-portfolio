<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove static categories from database
        \App\Models\Category::whereIn('name', [
            'Web Development', 
            'Mobile Apps', 
            'UI/UX Design'
        ])->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate static categories if needed
        $staticCategories = [
            ['name' => 'Web Development', 'slug' => 'web-development', 'is_active' => true, 'sort_order' => 1],
            ['name' => 'Mobile Apps', 'slug' => 'mobile-apps', 'is_active' => true, 'sort_order' => 2],
            ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'is_active' => true, 'sort_order' => 3],
        ];
        
        foreach ($staticCategories as $catData) {
            \App\Models\Category::create($catData);
        }
    }
};
