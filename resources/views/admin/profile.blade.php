@extends('layouts.admin')

@section('title', 'Profile Settings')
@section('page-title', 'Profile Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-user-cog mr-2 text-blue-600"></i>Profile Settings
        </h1>
        
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Hidden inputs for remove functionality -->
            <input type="hidden" name="remove_logo" id="remove_logo" value="0">
            <input type="hidden" name="remove_profile_image" id="remove_profile_image" value="0">

            <!-- Logo Section -->
            <div class="bg-gray-50 p-6 rounded-lg mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Logo (Menu/Header)</h3>
                <div class="flex items-center space-x-6">
                    <div id="logoContainer" class="flex-shrink-0 relative">
                        @if($user->logo_image)
                            <img src="{{ asset('storage/' . $user->logo_image) }}" alt="Logo" class="w-24 h-24 object-contain">
                            <button type="button" onclick="removeLogo()" class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs transition-colors" title="Remove Logo">
                                <i class="fas fa-times"></i>
                            </button>
                        @else
                            <div class="w-24 h-24 bg-gray-300 flex items-center justify-center rounded-lg">
                                <i class="fas fa-image text-gray-500 text-2xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload Logo</label>
                        <input type="file" name="logo_image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-sm text-gray-500 mt-1">Recommended: 100x100px, max 5MB. This will appear in the menu/header.</p>
                        @if($user->logo_image)
                            <div class="mt-2">
                                <button type="button" onclick="removeLogo()" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i>Remove Current Logo
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile Image Section -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Image (About Section)</h3>
                <div class="flex items-center space-x-6">
                    <div id="profileImageContainer" class="flex-shrink-0 relative">
                        @if($user->profile_image)
                            <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" class="w-24 h-24 rounded-full object-cover">
                            <button type="button" onclick="removeProfileImage()" class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs transition-colors" title="Remove Profile Image">
                                <i class="fas fa-times"></i>
                            </button>
                        @else
                            <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500 text-2xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Image</label>
                        <input type="file" name="profile_image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="text-sm text-gray-500 mt-1">Recommended: 400x400px, max 5MB</p>
                        @if($user->profile_image)
                            <div class="mt-2">
                                <button type="button" onclick="removeProfileImage()" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    <i class="fas fa-trash mr-1"></i>Remove Current Image
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                    <input type="text" name="job_title" value="{{ $user->job_title }}" placeholder="e.g., Web Developer, UI/UX Designer" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" value="{{ $user->location }}" placeholder="e.g., New York, USA" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- About Text -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">About Me</label>
                <textarea name="about_text" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tell us about yourself, your experience, and what you do...">{{ $user->about_text }}</textarea>
                <p class="text-sm text-gray-500 mt-1">This text will be displayed on your portfolio homepage</p>
            </div>

            <!-- Preview Section -->
            @if($user->profile_image || $user->about_text)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Preview</h3>
                    <div class="bg-white p-6 rounded-lg border">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                @if($user->profile_image)
                                    <img src="{{ Storage::url($user->profile_image) }}" alt="Profile" class="w-16 h-16 rounded-full object-cover">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h4>
                                @if($user->job_title)
                                    <p class="text-blue-600 font-medium">{{ $user->job_title }}</p>
                                @endif
                                @if($user->location)
                                    <p class="text-gray-600 text-sm">{{ $user->location }}</p>
                                @endif
                                @if($user->about_text)
                                    <p class="text-gray-700 mt-2">{{ Str::limit($user->about_text, 200) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-save mr-2"></i>Update Profile
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function removeLogo() {
    if (confirm('Are you sure you want to remove the current logo?')) {
        document.getElementById('remove_logo').value = '1';
        
        // Replace logo container with placeholder
        const logoContainer = document.getElementById('logoContainer');
        logoContainer.innerHTML = `
            <div class="w-24 h-24 bg-gray-300 flex items-center justify-center rounded-lg">
                <i class="fas fa-image text-gray-500 text-2xl"></i>
            </div>
        `;
        
        // Clear the file input
        const fileInput = document.querySelector('input[name="logo_image"]');
        if (fileInput) {
            fileInput.value = '';
        }
        
        // Hide the remove button text
        const removeButtonText = document.querySelector('button[onclick="removeLogo()"]');
        if (removeButtonText && removeButtonText.parentElement) {
            removeButtonText.parentElement.style.display = 'none';
        }
    }
}

function removeProfileImage() {
    if (confirm('Are you sure you want to remove the current profile image?')) {
        document.getElementById('remove_profile_image').value = '1';
        
        // Replace profile image container with placeholder
        const profileContainer = document.getElementById('profileImageContainer');
        profileContainer.innerHTML = `
            <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
                <i class="fas fa-user text-gray-500 text-2xl"></i>
            </div>
        `;
        
        // Clear the file input
        const fileInput = document.querySelector('input[name="profile_image"]');
        if (fileInput) {
            fileInput.value = '';
        }
        
        // Hide the remove button text
        const removeButtonText = document.querySelector('button[onclick="removeProfileImage()"]');
        if (removeButtonText && removeButtonText.parentElement) {
            removeButtonText.parentElement.style.display = 'none';
        }
    }
}
</script>
@endsection
