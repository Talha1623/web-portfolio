@extends('layouts.admin')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
@php
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
@endphp

<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-cog mr-2 text-blue-600"></i>System Settings
        </h1>
        
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Admin Panel Settings -->
            <div class="bg-blue-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-user-shield mr-2 text-blue-600"></i>Admin Panel Settings
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sidebar Name *</label>
                        <input type="text" name="admin_sidebar_name" value="{{ $settings['admin_sidebar_name'] ?? 'Super Admin' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="Super Admin" required>
                        <p class="text-sm text-gray-500 mt-1">This will appear in the admin sidebar</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sidebar Subtitle</label>
                        <input type="text" name="admin_sidebar_subtitle" value="{{ $settings['admin_sidebar_subtitle'] ?? 'Administrator' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="Administrator">
                        <p class="text-sm text-gray-500 mt-1">Optional subtitle below the main name</p>
                    </div>
                </div>
            </div>

            <!-- Website Settings -->
            <div class="bg-green-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-globe mr-2 text-green-600"></i>Website Settings
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Title *</label>
                        <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Muhammad Talha | Portfolio' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="Your Name | Portfolio" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                        <textarea name="site_description" rows="3" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                  placeholder="Brief description of your website">{{ $settings['site_description'] ?? 'Professional Laravel Developer & PHP Expert' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-yellow-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-address-book mr-2 text-yellow-600"></i>Contact Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'itsocial470@gmail.com' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="your@email.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+92 332 9911276' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="+1 234 567 8900">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" name="contact_address" value="{{ $settings['contact_address'] ?? 'Peshawar University Road, KPK, Pakistan' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="Your Address">
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-purple-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-share-alt mr-2 text-purple-600"></i>Social Media Links
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                        <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="https://facebook.com/yourprofile">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Twitter</label>
                        <input type="url" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="https://twitter.com/yourprofile">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn</label>
                        <input type="url" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="https://linkedin.com/in/yourprofile">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">GitHub</label>
                        <input type="url" name="social_github" value="{{ $settings['social_github'] ?? '' }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                               placeholder="https://github.com/yourprofile">
                    </div>
                </div>
            </div>

            <!-- System Settings -->
            <div class="bg-red-50 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    <i class="fas fa-server mr-2 text-red-600"></i>System Settings
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="maintenance_mode" value="1" {{ ($settings['maintenance_mode'] ?? '0') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-700">
                            Maintenance Mode
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="allow_registration" value="1" {{ ($settings['allow_registration'] ?? '0') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-700">
                            Allow User Registration
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <div class="flex space-x-4">
                    <button type="button" onclick="resetSettings()" 
                            class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        <i class="fas fa-undo mr-2"></i>Reset to Defaults
                    </button>
                </div>
                
                <div class="flex space-x-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i>Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Reset Confirmation Modal -->
<div id="resetModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                <i class="fas fa-exclamation-triangle text-yellow-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-4">Reset Settings</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">Are you sure you want to reset all settings to their default values? This action cannot be undone.</p>
            </div>
            <div class="flex justify-center space-x-4 mt-4">
                <button onclick="closeResetModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                    Cancel
                </button>
                <button onclick="confirmReset()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function resetSettings() {
    document.getElementById('resetModal').classList.remove('hidden');
}

function closeResetModal() {
    document.getElementById('resetModal').classList.add('hidden');
}

function confirmReset() {
    // Create form and submit
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("admin.settings.reset") }}';
    
    const methodField = document.createElement('input');
    methodField.type = 'hidden';
    methodField.name = '_method';
    methodField.value = 'POST';
    
    const tokenField = document.createElement('input');
    tokenField.type = 'hidden';
    tokenField.name = '_token';
    tokenField.value = '{{ csrf_token() }}';
    
    form.appendChild(methodField);
    form.appendChild(tokenField);
    document.body.appendChild(form);
    form.submit();
}
</script>
@endsection