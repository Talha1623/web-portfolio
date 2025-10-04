<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Get admin user profile data
        $user = User::where('is_admin', true)->first();
        return view('pages.index', compact('user'));
    }
   
}
