<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('key')->get();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'admin_sidebar_name' => 'required|string|max:255',
            'admin_sidebar_subtitle' => 'nullable|string|max:255',
            'site_title' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_github' => 'nullable|url|max:255',
            'maintenance_mode' => 'boolean',
            'allow_registration' => 'boolean',
        ]);

        // Update settings
        Setting::set('admin_sidebar_name', $request->admin_sidebar_name, 'text', 'Admin sidebar main title');
        Setting::set('admin_sidebar_subtitle', $request->admin_sidebar_subtitle, 'text', 'Admin sidebar subtitle');
        Setting::set('site_title', $request->site_title, 'text', 'Website main title');
        Setting::set('site_description', $request->site_description, 'text', 'Website description');
        Setting::set('contact_email', $request->contact_email, 'email', 'Contact email address');
        Setting::set('contact_phone', $request->contact_phone, 'text', 'Contact phone number');
        Setting::set('contact_address', $request->contact_address, 'text', 'Contact address');
        Setting::set('social_facebook', $request->social_facebook, 'url', 'Facebook profile URL');
        Setting::set('social_twitter', $request->social_twitter, 'url', 'Twitter profile URL');
        Setting::set('social_linkedin', $request->social_linkedin, 'url', 'LinkedIn profile URL');
        Setting::set('social_github', $request->social_github, 'url', 'GitHub profile URL');
        Setting::set('maintenance_mode', $request->has('maintenance_mode') ? '1' : '0', 'boolean', 'Enable maintenance mode');
        Setting::set('allow_registration', $request->has('allow_registration') ? '1' : '0', 'boolean', 'Allow user registration');

        // Clear cache
        Setting::clearCache();

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }

    public function reset()
    {
        // Reset to default settings
        $defaults = [
            'admin_sidebar_name' => 'Super Admin',
            'admin_sidebar_subtitle' => 'Administrator',
            'site_title' => 'Muhammad Talha | Portfolio',
            'site_description' => 'Professional Laravel Developer & PHP Expert',
            'contact_email' => 'itsocial470@gmail.com',
            'contact_phone' => '+92 332 9911276',
            'contact_address' => 'Peshawar University Road, KPK, Pakistan',
            'social_facebook' => '',
            'social_twitter' => '',
            'social_linkedin' => '',
            'social_github' => '',
            'maintenance_mode' => '0',
            'allow_registration' => '0',
        ];

        foreach ($defaults as $key => $value) {
            Setting::set($key, $value);
        }

        Setting::clearCache();

        return redirect()->route('admin.settings')->with('success', 'Settings reset to defaults successfully.');
    }
}