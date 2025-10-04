<?php

require_once 'vendor/autoload.php';

use App\Models\Project;
use App\Models\Category;

// Test the Project model
echo "Testing Project model...\n";

try {
    // Create a test project with old category system
    $project = new Project();
    $project->title = 'Test Project';
    $project->category = 'web'; // Old string category
    $project->description = 'Test description';
    
    echo "Project category name: " . $project->category_name . "\n";
    echo "Test completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
