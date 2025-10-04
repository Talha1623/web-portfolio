<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    protected $fillable = [
        'title', 'category', 'description', 'image', 'badge', 'link', 'tags', 'category_id'
    ];

    // Cast tags to array automatically
    protected $casts = [
        'tags' => 'array',
    ];

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get category name (handles both old and new systems)
    public function getCategoryNameAttribute()
    {
        // Check if we have a category relationship (new system)
        if ($this->category_id && $this->category) {
            return $this->category->name;
        }
        
        // Fallback to old category field
        return $this->attributes['category'] ?? 'Uncategorized';
    }
}
