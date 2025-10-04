<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Message;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get last 7 days data for charts
        $last7Days = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $last7Days->push($date->format('M d'));
        }

        // Projects chart data
        $projectsChartData = [];
        $projectsChartLabels = [];
        
        foreach ($last7Days as $day) {
            $date = \Carbon\Carbon::createFromFormat('M d', $day)->format('Y-m-d');
            $count = Project::whereDate('created_at', $date)->count();
            $projectsChartData[] = $count;
            $projectsChartLabels[] = $day;
        }

        // Messages chart data (contacts + messages)
        $messagesChartData = [];
        $messagesChartLabels = [];
        
        foreach ($last7Days as $day) {
            $date = \Carbon\Carbon::createFromFormat('M d', $day)->format('Y-m-d');
            $contactsCount = Contact::whereDate('created_at', $date)->count();
            $messagesCount = Message::whereDate('created_at', $date)->count();
            $totalCount = $contactsCount + $messagesCount;
            $messagesChartData[] = $totalCount;
            $messagesChartLabels[] = $day;
        }

        // Get dashboard statistics
        $stats = [
            'total_projects' => Project::count(),
            'total_contacts' => Contact::count(),
            'total_messages' => Message::count(),
            'recent_projects' => Project::latest()->take(5)->get(),
            'recent_contacts' => Contact::latest()->take(5)->get(),
            'recent_messages' => Message::latest()->take(5)->get(),
            'projects_chart' => [
                'labels' => $projectsChartLabels,
                'data' => $projectsChartData
            ],
            'messages_chart' => [
                'labels' => $messagesChartLabels,
                'data' => $messagesChartData
            ]
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
