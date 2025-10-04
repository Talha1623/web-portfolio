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
        // Map old category values to new category IDs
        $categoryMapping = [
            'web' => 'Web Development',
            'mobile' => 'Mobile Apps',
            'design' => 'UI/UX Design',
            'graphic' => 'UI/UX Design', // Map graphic to UI/UX Design
            'other' => 'Web Development' // Map other to Web Development
        ];

        // Get all projects with old category system
        $projects = \App\Models\Project::whereNotNull('category')
                                      ->whereNull('category_id')
                                      ->get();

        foreach ($projects as $project) {
            $oldCategory = $project->category;
            $categoryName = $categoryMapping[$oldCategory] ?? 'Web Development';
            
            // Find or create category
            $category = \App\Models\Category::where('name', $categoryName)->first();
            
            if ($category) {
                $project->category_id = $category->id;
                $project->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reset category_id to null for migrated projects
        \App\Models\Project::whereNotNull('category_id')
                              ->update(['category_id' => null]);
    }
};
