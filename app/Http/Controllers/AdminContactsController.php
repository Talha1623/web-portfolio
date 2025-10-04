<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Message;

class AdminContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        $messages = Message::orderBy('created_at', 'desc')->get();
        
        return view('admin.contacts', compact('contacts', 'messages'));
    }

    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success', 'Contact deleted successfully.');
    }

    public function destroyMessage(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.contacts')->with('success', 'Message deleted successfully.');
    }

    public function markAllAsRead()
    {
        // Mark all contacts as read
        Contact::where('is_read', false)->update(['is_read' => true]);
        
        // Mark all messages as read
        Message::where('is_read', false)->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
}
