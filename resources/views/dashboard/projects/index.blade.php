@extends('layouts.admin')

@section('title', 'Projects Management')
@section('page-title', 'Projects')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Projects Management</h1>
            <p class="text-gray-600">Manage your portfolio projects</p>
        </div>
        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Project
        </a>
    </div>

    <!-- Projects Table -->
    @if($projects->count() > 0)
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Table Header with Stats -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <i class="fas fa-project-diagram text-blue-600 text-xl mr-3"></i>
                            <h3 class="text-lg font-semibold text-gray-800">Projects Overview</h3>
                        </div>
                        <div class="flex items-center space-x-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">{{ $projects->count() }}</div>
                                <div class="text-xs text-gray-500">Total Projects</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">{{ $projects->where('badge', '!=', null)->count() }}</div>
                                <div class="text-xs text-gray-500">Featured</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Last updated:</span>
                        <span class="text-sm font-medium text-gray-700">{{ now()->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Professional Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-image mr-2"></i>Project Details
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-tags mr-2"></i>Category
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-info-circle mr-2"></i>Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-calendar mr-2"></i>Created
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-cogs mr-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($projects as $project)
                            <tr class="hover:bg-blue-50 transition-colors duration-200 group">
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            @if($project->image)
                                                <div class="relative">
                                                    <img class="h-12 w-12 rounded-lg object-cover shadow-sm border border-gray-200" src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}">
                                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border border-white"></div>
                                                </div>
                                            @else
                                                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-sm border border-gray-200">
                                                    <i class="fas fa-image text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center space-x-2">
                                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $project->title }}</h4>
                                                @if($project->badge)
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        <i class="fas fa-star mr-1"></i>{{ $project->badge }}
                                                    </span>
                                                @endif
                                            </div>
                                            <p class="text-xs text-gray-600 mt-0.5 line-clamp-1">{{ Str::limit($project->description, 50) }}</p>
                                            @if($project->link)
                                                <div class="flex items-center mt-1">
                                                    <i class="fas fa-link text-gray-400 text-xs mr-1"></i>
                                                    <span class="text-xs text-blue-600">Live Available</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-folder mr-1"></i>{{ $project->category_name }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if($project->badge)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>{{ $project->badge }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <i class="fas fa-clock mr-1"></i>Active
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-xs text-gray-600">
                                        <div class="font-medium">{{ $project->created_at->format('M d, Y') }}</div>
                                        <div class="text-gray-500">{{ $project->created_at->diffForHumans() }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center space-x-1">
                                        <!-- View Button -->
                                        <button onclick="viewProject({{ $project->id }})" 
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded transition-colors duration-200" 
                                                title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        
                                        <!-- Edit Button -->
                                        <a href="{{ route('projects.edit', $project) }}" 
                                           class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 hover:bg-yellow-100 rounded transition-colors duration-200" 
                                           title="Edit Project">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- External Link -->
                                        @if($project->link)
                                            <a href="{{ $project->link }}" target="_blank" 
                                               class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-600 bg-green-50 hover:bg-green-100 rounded transition-colors duration-200" 
                                               title="View Live Project">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                        
                                        <!-- Delete Button -->
                                        <button onclick="deleteProject({{ $project->id }})" 
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded transition-colors duration-200" 
                                                title="Delete Project">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-project-diagram text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No projects yet</h3>
            <p class="text-gray-600 mb-6">Get started by creating your first project</p>
            <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                <i class="fas fa-plus mr-2"></i>Create First Project
            </a>
        </div>
    @endif
</div>

<!-- View Project Modal -->
<div id="viewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Project Details</h3>
                <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div id="projectDetails" class="space-y-4">
                <!-- Project details will be loaded here -->
            </div>
        </div>
    </div>
        </div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-4">Delete Project</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">Are you sure you want to delete this project? This action cannot be undone.</p>
            </div>
            <div class="flex justify-center space-x-4 mt-4">
                <button onclick="closeDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                    Cancel
                </button>
                <button id="confirmDelete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function viewProject(projectId) {
    // Find the project data from the table
    const projectRow = document.querySelector(`button[onclick="viewProject(${projectId})"]`).closest('tr');
    
    // Get project title (updated selector for new structure)
    const projectTitle = projectRow.querySelector('h4.text-lg.font-semibold').textContent;
    
    // Get project description (updated selector)
    const projectDescription = projectRow.querySelector('p.text-sm.text-gray-600').textContent;
    
    // Get project category (updated selector)
    const projectCategory = projectRow.querySelector('span.bg-blue-100').textContent.trim();
    
    // Get project status (updated selector)
    const statusElement = projectRow.querySelector('span.bg-green-100, span.bg-gray-100');
    const projectStatus = statusElement ? statusElement.textContent.trim() : 'Active';
    
    // Get project date (updated selector)
    const dateElement = projectRow.querySelector('span.text-sm.font-medium.text-gray-700');
    const projectDate = dateElement ? dateElement.textContent : 'N/A';
    
    // Get project image if exists
    const projectImage = projectRow.querySelector('img');
    const imageHtml = projectImage ? `<img src="${projectImage.src}" alt="${projectTitle}" class="w-full h-48 object-cover rounded-lg mb-4">` : '<div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-lg mb-4"><i class="fas fa-image text-gray-400 text-4xl"></i></div>';
    
    // Get project link if exists
    const projectLink = projectRow.querySelector('a[target="_blank"]');
    const linkHtml = projectLink ? `<a href="${projectLink.href}" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"><i class="fas fa-external-link-alt mr-2"></i>View Live Project</a>` : '';
    
    document.getElementById('projectDetails').innerHTML = `
        <div class="space-y-4">
            ${imageHtml}
            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">${projectTitle}</h4>
                <p class="text-gray-600 mb-4">${projectDescription}</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">${projectCategory}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${projectStatus === 'Active' ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800'}">${projectStatus}</span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Created</label>
                <p class="text-gray-600">${projectDate}</p>
            </div>
            ${linkHtml ? `<div class="pt-4">${linkHtml}</div>` : ''}
        </div>
    `;
    document.getElementById('viewModal').classList.remove('hidden');
}

function closeViewModal() {
    document.getElementById('viewModal').classList.add('hidden');
}

function deleteProject(projectId) {
    document.getElementById('confirmDelete').onclick = function() {
        // Create and submit delete form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/dashboard/projects/' + projectId;
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        const tokenField = document.createElement('input');
        tokenField.type = 'hidden';
        tokenField.name = '_token';
        tokenField.value = '{{ csrf_token() }}';
        
        form.appendChild(methodField);
        form.appendChild(tokenField);
        document.body.appendChild(form);
        form.submit();
    };
    
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection

