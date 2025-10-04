<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#1E40AF',
                        sidebar: '#083344',
                        active: '#00d03c',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-sidebar text-white w-56 min-h-screen shadow-lg">
                <!-- Logo -->
                <div class="p-4 border-b border-white/20">
                    <h1 class="text-lg font-bold flex items-center">
                        <i class="fas fa-crown mr-2 text-yellow-300"></i>
                        <span class="truncate">
                            @php
                                $sidebarName = \App\Models\Setting::where('key', 'admin_sidebar_name')->first();
                                echo $sidebarName ? $sidebarName->value : 'Super Admin';
                            @endphp
                        </span>
                    </h1>
                    @php
                        $sidebarSubtitle = \App\Models\Setting::where('key', 'admin_sidebar_subtitle')->first();
                    @endphp
                    @if($sidebarSubtitle && $sidebarSubtitle->value)
                        <p class="text-xs text-white/70 mt-1">{{ $sidebarSubtitle->value }}</p>
                    @endif
                </div>

            <!-- Navigation Menu -->
            <nav class="mt-4">
                <div class="px-3 mb-2">
                    <h3 class="text-xs font-semibold text-white/70 uppercase tracking-wider">Main</h3>
                </div>
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition {{ request()->routeIs('admin.dashboard') ? 'bg-active text-white' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3 w-4"></i>
                    <span class="truncate">Dashboard</span>
                </a>

                <!-- Projects -->
                <a href="{{ route('projects.index') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition {{ request()->routeIs('projects.*') ? 'bg-active text-white' : '' }}">
                    <i class="fas fa-project-diagram mr-3 w-4"></i>
                    <span class="truncate">Projects</span>
                </a>

                <!-- Profile Settings -->
                <a href="{{ route('admin.profile') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition {{ request()->routeIs('admin.profile*') ? 'bg-active text-white' : '' }}">
                    <i class="fas fa-user-cog mr-3 w-4"></i>
                    <span class="truncate">Profile</span>
                </a>

                <!-- Categories -->
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition {{ request()->routeIs('admin.categories*') ? 'bg-active text-white' : '' }}">
                    <i class="fas fa-tags mr-3 w-4"></i>
                    <span class="truncate">Categories</span>
                </a>

                <!-- Add Project -->
                <a href="{{ route('projects.create') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition">
                    <i class="fas fa-plus mr-3 w-4"></i>
                    <span class="truncate">Add Project</span>
                </a>

                <!-- Settings -->
                <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-2.5 text-white/90 hover:bg-white/20 hover:text-white transition {{ request()->routeIs('admin.settings*') ? 'bg-active text-white' : '' }}">
                    <i class="fas fa-cog mr-3 w-4"></i>
                    <span class="truncate">Settings</span>
                </a>

                <div class="px-3 mt-6">
                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">External</h3>
                </div>

                <!-- View Portfolio -->
                <a href="/" target="_blank" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                    <i class="fas fa-external-link-alt mr-3"></i>
                    View Portfolio
                </a>
            </nav>

            <!-- User Info -->
            <div class="absolute bottom-0 w-56 p-4 border-t border-white/20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">Super Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 lg:hidden">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800 ml-4">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative">
                            <button onclick="toggleNotifications()" class="relative text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition-all duration-300 ease-in-out hover:scale-110">
                                <i class="fas fa-bell text-xl animate-pulse"></i>
                                @php
                                    $contactCount = \App\Models\Contact::where('is_read', false)->count();
                                    $messageCount = \App\Models\Message::where('is_read', false)->count();
                                    $totalCount = $contactCount + $messageCount;
                                    $latestContacts = \App\Models\Contact::orderBy('created_at', 'desc')->take(5)->get();
                                    $latestMessages = \App\Models\Message::orderBy('created_at', 'desc')->take(5)->get();
                                @endphp
                                @if($totalCount > 0)
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold animate-bounce">
                                        {{ $totalCount }}
                                    </span>
                                @endif
                            </button>
                            
                            <!-- Notification Dropdown -->
                            <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-800">Recent Messages</h3>
                                    <p class="text-sm text-gray-500">{{ $totalCount }} total notifications</p>
                                </div>
                                
                                <div class="max-h-64 overflow-y-auto">
                                    @if($latestContacts->count() > 0)
                                        @foreach($latestContacts as $contact)
                                            <div class="p-3 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                            <i class="fas fa-user text-blue-600 text-sm"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900">{{ $contact->name }}</p>
                                                        <p class="text-sm text-gray-500 truncate">{{ $contact->message }}</p>
                                                        <p class="text-xs text-gray-400">{{ $contact->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                    @if($latestMessages->count() > 0)
                                        @foreach($latestMessages as $message)
                                            <div class="p-3 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                            <i class="fas fa-comment text-green-600 text-sm"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900">{{ $message->name }}</p>
                                                        <p class="text-sm text-gray-500 truncate">{{ $message->message }}</p>
                                                        <p class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                    @if($totalCount == 0)
                                        <div class="p-6 text-center">
                                            <i class="fas fa-bell-slash text-gray-400 text-2xl mb-2"></i>
                                            <p class="text-gray-500">No new notifications</p>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="p-3 border-t border-gray-200">
                                    <a href="{{ route('admin.contacts') }}" class="block w-full text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                        View All Messages
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Logout -->
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @if(session('success'))
                        <div id="successPopup" class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transform transition-all duration-500 ease-in-out translate-x-0 opacity-100">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium">{{ session('success') }}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <button onclick="closeSuccessPopup()" class="text-white hover:text-gray-200 focus:outline-none">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="bg-green-400 h-1 rounded-full overflow-hidden">
                                    <div id="progressBar" class="bg-white h-1 rounded-full transition-all duration-5000 ease-out" style="width: 0%; transform: translateX(-100%);"></div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="fixed inset-0 z-40 lg:hidden hidden" id="mobile-sidebar-overlay">
        <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.querySelector('.lg\\:hidden button');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    overlay.classList.toggle('hidden');
                });
            }
            
            if (overlay) {
                overlay.addEventListener('click', function() {
                    overlay.classList.add('hidden');
                });
            }
        });

        // Notification dropdown toggle
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');
            
            // Add smooth animation
            if (!dropdown.classList.contains('hidden')) {
                dropdown.style.opacity = '0';
                dropdown.style.transform = 'translateY(-10px)';
                dropdown.style.transition = 'all 0.3s ease-in-out';
                
                setTimeout(() => {
                    dropdown.style.opacity = '1';
                    dropdown.style.transform = 'translateY(0)';
                }, 10);
                
                // Mark all messages as read when dropdown opens
                markAllAsRead();
            }
        }
        
        // Mark all messages as read
        function markAllAsRead() {
            fetch('/dashboard/mark-all-read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update notification count to 0
                    const badge = document.querySelector('span.absolute.-top-2.-right-2');
                    if (badge) {
                        badge.textContent = '0';
                        badge.style.display = 'none';
                    }
                    
                    // Update bell icon animation
                    const bellIcon = document.querySelector('button[onclick="toggleNotifications()"] i');
                    if (bellIcon) {
                        bellIcon.style.animation = 'none';
                    }
                }
            })
            .catch(error => {
                console.error('Error marking messages as read:', error);
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('notificationDropdown');
            const button = event.target.closest('button[onclick="toggleNotifications()"]');
            
            if (!dropdown.contains(event.target) && !button) {
                dropdown.classList.add('hidden');
            }
        });

        // Add slow animation to bell icon
        document.addEventListener('DOMContentLoaded', function() {
            const bellIcon = document.querySelector('button[onclick="toggleNotifications()"] i');
            if (bellIcon) {
                bellIcon.style.animation = 'pulse 2s infinite';
            }
        });

        // Success popup functionality
        document.addEventListener('DOMContentLoaded', function() {
            const successPopup = document.getElementById('successPopup');
            if (successPopup) {
                // Start progress bar animation with white line effect
                const progressBar = document.getElementById('progressBar');
                if (progressBar) {
                    // Reset initial state
                    progressBar.style.width = '100%';
                    progressBar.style.transform = 'translateX(-100%)';
                    progressBar.style.transition = 'transform 5s ease-out';
                    
                    // Start animation after a small delay
                    setTimeout(() => {
                        progressBar.style.transform = 'translateX(0%)';
                    }, 100);
                    
                    // Add fade out effect at the end
                    setTimeout(() => {
                        progressBar.style.opacity = '0';
                        progressBar.style.transition = 'opacity 0.5s ease-out';
                    }, 4500);
                }

                // Auto close after 5 seconds
                setTimeout(() => {
                    closeSuccessPopup();
                }, 5000);
            }
        });

        // Close success popup function
        function closeSuccessPopup() {
            const popup = document.getElementById('successPopup');
            if (popup) {
                popup.style.transform = 'translateX(100%)';
                popup.style.opacity = '0';
                setTimeout(() => {
                    popup.remove();
                }, 500);
            }
        }
    </script>
</body>
</html>
