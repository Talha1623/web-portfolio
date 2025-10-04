@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-edit mr-2 text-blue-600"></i>Edit Project
        </h1>
        
        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Project Title *</label>
                    <input type="text" name="title" value="{{ $project->title }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">Select Category</option>
                        @foreach(\App\Models\Category::active()->ordered()->get() as $category)
                            <option value="{{ $category->id }}" 
                                    {{ ($project->category_id == $category->id) || (!$project->category_id && $project->attributes['category'] == strtolower($category->name)) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">
                        <a href="{{ route('admin.categories.create') }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-plus mr-1"></i>Add New Category
                        </a>
                    </p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ $project->description }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Project Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @if($project->image)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="{{ Storage::url($project->image) }}" alt="Current image" class="w-32 h-24 object-cover rounded-lg">
                        </div>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Badge</label>
                    <input type="text" name="badge" value="{{ $project->badge }}" placeholder="e.g., Featured, New, Popular" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Project Link</label>
                <input type="url" name="link" value="{{ $project->link }}" placeholder="https://example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                <input type="text" name="tags" value="{{ is_array($project->tags) ? implode(', ', $project->tags) : $project->tags }}" placeholder="HTML, CSS, Laravel, JavaScript" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Separate tags with commas</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('projects.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
