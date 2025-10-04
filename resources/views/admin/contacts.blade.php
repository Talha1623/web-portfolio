@extends('layouts.admin')

@section('title', 'Contacts Management')
@section('page-title', 'Contacts')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-envelope mr-2 text-blue-600"></i>Contacts Management
            </h1>
            <p class="text-gray-600 mt-1">Manage contact form submissions and messages</p>
        </div>
        <div class="flex space-x-3">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <i class="fas fa-users mr-1"></i>
                {{ $contacts->count() }} Contacts
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                <i class="fas fa-comments mr-1"></i>
                {{ $messages->count() }} Messages
            </span>
        </div>
    </div>

    <!-- Contacts Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-address-book mr-2 text-blue-600"></i>Contact Form Submissions
            </h3>
        </div>
        
        @if($contacts->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <i class="fas fa-user text-blue-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ $contact->message }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $contact->created_at->format('M d, Y') }}
                                    <div class="text-xs text-gray-400">{{ $contact->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="viewContact({{ $contact->id }})" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="mailto:{{ $contact->email }}" class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No contacts yet</h3>
                <p class="text-gray-500">Contact form submissions will appear here.</p>
            </div>
        @endif
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-comments mr-2 text-green-600"></i>Messages
            </h3>
        </div>
        
        @if($messages->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($messages as $message)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                                <i class="fas fa-comment text-green-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ $message->message }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $message->created_at->format('M d, Y') }}
                                    <div class="text-xs text-gray-400">{{ $message->created_at->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="viewMessage({{ $message->id }})" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="mailto:{{ $message->email }}" class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy-message', $message) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-comments text-gray-400 text-4xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No messages yet</h3>
                <p class="text-gray-500">Messages will appear here.</p>
            </div>
        @endif
    </div>
</div>

<!-- View Contact Modal -->
<div id="contactModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Contact Details</h3>
                <button onclick="closeContactModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="contactDetails" class="space-y-4">
                <!-- Contact details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- View Message Modal -->
<div id="messageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Message Details</h3>
                <button onclick="closeMessageModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="messageDetails" class="space-y-4">
                <!-- Message details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
function viewContact(contactId) {
    console.log('View contact clicked:', contactId);
    
    // Find the contact data from the table
    const contactRow = document.querySelector(`button[onclick="viewContact(${contactId})"]`).closest('tr');
    console.log('Contact row found:', contactRow);
    
    if (!contactRow) {
        alert('Contact row not found');
        return;
    }
    
    const contactName = contactRow.querySelector('.text-sm.font-medium.text-gray-900')?.textContent || 'Unknown';
    const contactEmail = contactRow.querySelector('.text-sm.text-gray-500')?.textContent || 'No email';
    const contactMessage = contactRow.querySelector('td:nth-child(3) .text-sm.text-gray-900')?.textContent || 'No message';
    const contactDate = contactRow.querySelector('td:nth-child(4) .text-sm.text-gray-500')?.textContent || 'No date';
    const contactTime = contactRow.querySelector('td:nth-child(4) .text-xs.text-gray-400')?.textContent || 'No time';
    
    document.getElementById('contactDetails').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 h-12 w-12">
                    <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">${contactName}</h4>
                    <p class="text-blue-600">${contactEmail}</p>
                </div>
            </div>
            
            <div class="border-t pt-4">
                <h5 class="font-medium text-gray-800 mb-2">Message</h5>
                <p class="text-gray-700 bg-gray-50 p-3 rounded-lg whitespace-pre-wrap">${contactMessage}</p>
            </div>
            
            <div class="border-t pt-4">
                <h5 class="font-medium text-gray-800 mb-2">Contact Information</h5>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Date:</span>
                        <span class="text-gray-800">${contactDate}</span>
                    </div>
                    <div>
                        <span class="text-gray-500">Time:</span>
                        <span class="text-gray-800">${contactTime}</span>
                    </div>
                </div>
            </div>
            
            <div class="border-t pt-4 flex space-x-3">
                <a href="mailto:${contactEmail}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-reply mr-2"></i>Reply
                </a>
                <button onclick="closeContactModal()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-times mr-2"></i>Close
                </button>
            </div>
        </div>
    `;
    document.getElementById('contactModal').classList.remove('hidden');
}

function closeContactModal() {
    document.getElementById('contactModal').classList.add('hidden');
}

function viewMessage(messageId) {
    console.log('View message clicked:', messageId);
    
    // Find the message data from the table
    const messageRow = document.querySelector(`button[onclick="viewMessage(${messageId})"]`).closest('tr');
    console.log('Message row found:', messageRow);
    
    if (!messageRow) {
        alert('Message row not found');
        return;
    }
    
    const messageName = messageRow.querySelector('.text-sm.font-medium.text-gray-900')?.textContent || 'Unknown';
    const messageEmail = messageRow.querySelector('.text-sm.text-gray-500')?.textContent || 'No email';
    const messageText = messageRow.querySelector('td:nth-child(2) .text-sm.text-gray-900')?.textContent || 'No message';
    const messageDate = messageRow.querySelector('td:nth-child(3) .text-sm.text-gray-500')?.textContent || 'No date';
    const messageTime = messageRow.querySelector('td:nth-child(3) .text-xs.text-gray-400')?.textContent || 'No time';
    
    document.getElementById('messageDetails').innerHTML = `
        <div class="space-y-4">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 h-12 w-12">
                    <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-comment text-green-600 text-xl"></i>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">${messageName}</h4>
                    <p class="text-green-600">${messageEmail}</p>
                </div>
            </div>
            
            <div class="border-t pt-4">
                <h5 class="font-medium text-gray-800 mb-2">Message</h5>
                <p class="text-gray-700 bg-gray-50 p-3 rounded-lg whitespace-pre-wrap">${messageText}</p>
            </div>
            
            <div class="border-t pt-4">
                <h5 class="font-medium text-gray-800 mb-2">Message Information</h5>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Date:</span>
                        <span class="text-gray-800">${messageDate}</span>
                    </div>
                    <div>
                        <span class="text-gray-500">Time:</span>
                        <span class="text-gray-800">${messageTime}</span>
                    </div>
                </div>
            </div>
            
            <div class="border-t pt-4 flex space-x-3">
                <a href="mailto:${messageEmail}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-reply mr-2"></i>Reply
                </a>
                <button onclick="closeMessageModal()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-times mr-2"></i>Close
                </button>
            </div>
        </div>
    `;
    document.getElementById('messageModal').classList.remove('hidden');
}

function closeMessageModal() {
    document.getElementById('messageModal').classList.add('hidden');
}
</script>
@endsection
