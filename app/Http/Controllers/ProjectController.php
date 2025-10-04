<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Dashboard: list projects
    public function index()
    {
        $projects = Project::with('category')->orderBy('created_at','desc')->get();
        return view('dashboard.projects.index', compact('projects'));
    }

    // Dashboard: show create form
    public function create()
    {
        $categories = \App\Models\Category::active()->ordered()->get();
        return view('dashboard.projects.create', compact('categories'));
    }

    // Store uploaded project (image handling + tags json)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'badge' => 'nullable|string|max:50',
            'link' => 'nullable|url',
            'tags' => 'nullable|string', // comma separated input
            'image' => 'nullable|image|max:5120' // max 5MB
        ]);

        // handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            // store in storage/app/public/projects
            $path = $file->storeAs('projects', $filename, 'public');
            $data['image'] = $path;
        }

        // convert tags string "html, css, js" -> json array
        if (!empty($data['tags'])) {
            $tags = array_values(array_filter(array_map('trim', explode(',', $data['tags']))));
            $data['tags'] = $tags;
        } else {
            $data['tags'] = [];
        }

        Project::create($data);

        return redirect()->route('admin.dashboard')->with('success','Project added successfully.');
    }

    // Public portfolio page
    public function publicIndex()
    {
        $projects = Project::with('category')->orderBy('created_at','desc')->get();
        // Get active categories for filter buttons
        $categories = \App\Models\Category::active()->ordered()->get();
        
        // If no categories exist, create some default ones
        if ($categories->isEmpty()) {
            \Log::warning('No categories found, creating defaults');
            $defaultCategories = [
                ['name' => 'Web Development', 'slug' => 'web-development', 'is_active' => true, 'sort_order' => 1],
                ['name' => 'Mobile Apps', 'slug' => 'mobile-apps', 'is_active' => true, 'sort_order' => 2],
                ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'is_active' => true, 'sort_order' => 3],
            ];
            
            foreach ($defaultCategories as $catData) {
                \App\Models\Category::create($catData);
            }
            
            $categories = \App\Models\Category::active()->ordered()->get();
        }
        
        // Get admin user profile data for logo and name
        $user = \App\Models\User::where('is_admin', true)->first();
        
        return view('portfolio', compact('projects','categories','user'));
    }
    public function edit(Project $project)
    {
        $project->load('category');
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'badge' => 'nullable|string|max:50',
            'link' => 'nullable|url',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:5120'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('projects', $filename, 'public');
            $data['image'] = $path;
        }

        // Convert tags string to array
        if (!empty($data['tags'])) {
            $tags = array_values(array_filter(array_map('trim', explode(',', $data['tags']))));
            $data['tags'] = $tags;
        } else {
            $data['tags'] = [];
        }

        $project->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
