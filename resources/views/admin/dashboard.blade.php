@extends('layouts.admin')

@section('title', 'Super Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-project-diagram text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-600">Projects</p>
                        <p class="text-xl font-bold text-gray-900">{{ $stats['total_projects'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-envelope text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-600">Contacts</p>
                        <p class="text-xl font-bold text-gray-900">{{ $stats['total_contacts'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-comments text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-600">Messages</p>
                        <p class="text-xl font-bold text-gray-900">{{ $stats['total_messages'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <div class="flex items-center">
                    <div class="p-2 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-users text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-600">Status</p>
                        <p class="text-xl font-bold text-gray-900">Active</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 mb-6">
            <h2 class="text-lg font-semibold mb-3">
                <i class="fas fa-bolt mr-2 text-yellow-500"></i>Quick Actions
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg text-center transition flex items-center justify-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span class="text-sm font-medium">Add Project</span>
                </a>
                <a href="{{ route('projects.index') }}" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-lg text-center transition flex items-center justify-center space-x-2">
                    <i class="fas fa-list"></i>
                    <span class="text-sm font-medium">Manage Projects</span>
                </a>
                <a href="/" class="bg-purple-500 hover:bg-purple-600 text-white p-3 rounded-lg text-center transition flex items-center justify-center space-x-2" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span class="text-sm font-medium">View Portfolio</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Recent Projects -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-semibold mb-3">
                    <i class="fas fa-project-diagram mr-2 text-blue-500"></i>Recent Projects
                </h3>
                @if($stats['recent_projects']->count() > 0)
                    <div class="space-y-2">
                        @foreach($stats['recent_projects'] as $project)
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded text-sm">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $project->title }}</p>
                                    <p class="text-xs text-gray-600">{{ $project->category }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No projects yet</p>
                @endif
            </div>

            <!-- Recent Contacts -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-semibold mb-3">
                    <i class="fas fa-envelope mr-2 text-green-500"></i>Recent Contacts
                </h3>
                @if($stats['recent_contacts']->count() > 0)
                    <div class="space-y-2">
                        @foreach($stats['recent_contacts'] as $contact)
                            <div class="flex items-center justify-between p-2 bg-gray-50 rounded text-sm">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $contact->name }}</p>
                                    <p class="text-xs text-gray-600">{{ $contact->email }}</p>
                                </div>
                                <span class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">No contacts yet</p>
                @endif
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">
            <!-- Projects Chart -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-semibold mb-3">
                    <i class="fas fa-chart-line mr-2 text-blue-500"></i>Projects Overview
                </h3>
                <div class="h-48">
                    <canvas id="projectsChart"></canvas>
                </div>
            </div>

            <!-- Messages Chart -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-semibold mb-3">
                    <i class="fas fa-chart-bar mr-2 text-green-500"></i>Messages Overview
                </h3>
                <div class="h-48">
                    <canvas id="messagesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
        // Projects Chart
        const projectsCtx = document.getElementById('projectsChart').getContext('2d');
        const projectsChart = new Chart(projectsCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($stats['projects_chart']['labels']) !!},
                datasets: [{
                    label: 'Projects Created',
                    data: {!! json_encode($stats['projects_chart']['data']) !!},
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Messages Chart
        const messagesCtx = document.getElementById('messagesChart').getContext('2d');
        const messagesChart = new Chart(messagesCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($stats['messages_chart']['labels']) !!},
                datasets: [{
                    label: 'Messages Received',
                    data: {!! json_encode($stats['messages_chart']['data']) !!},
                    backgroundColor: [
                        'rgba(34, 197, 94, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(168, 85, 247, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(139, 92, 246, 0.8)'
                    ],
                    borderColor: [
                        'rgb(34, 197, 94)',
                        'rgb(59, 130, 246)',
                        'rgb(168, 85, 247)',
                        'rgb(245, 158, 11)',
                        'rgb(239, 68, 68)',
                        'rgb(16, 185, 129)',
                        'rgb(139, 92, 246)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
        </script>
@endsection
