<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'job_title' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'about_text' => 'nullable|string',
            'profile_image' => 'nullable|image|max:5120',
            'logo_image' => 'nullable|image|max:5120',
            'remove_logo' => 'nullable|boolean',
            'remove_profile_image' => 'nullable|boolean'
        ]);

        // Handle remove logo request
        if ($request->has('remove_logo') && $request->remove_logo == '1') {
            if ($user->logo_image && Storage::disk('public')->exists($user->logo_image)) {
                Storage::disk('public')->delete($user->logo_image);
                if (file_exists(public_path('storage/' . $user->logo_image))) {
                    unlink(public_path('storage/' . $user->logo_image));
                }
            }
            $data['logo_image'] = null;
            // Force update the logo_image field to null
            $user->logo_image = null;
        }

        // Handle remove profile image request
        if ($request->has('remove_profile_image') && $request->remove_profile_image == '1') {
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
                if (file_exists(public_path('storage/' . $user->profile_image))) {
                    unlink(public_path('storage/' . $user->profile_image));
                }
            }
            $data['profile_image'] = null;
            // Force update the profile_image field to null
            $user->profile_image = null;
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
                // Also delete from public storage
                if (file_exists(public_path('storage/' . $user->profile_image))) {
                    unlink(public_path('storage/' . $user->profile_image));
                }
            }
            
            $file = $request->file('profile_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile', $filename, 'public');
            
            // Copy to public storage for immediate access
            $sourcePath = storage_path('app/public/' . $path);
            $destPath = public_path('storage/' . $path);
            $destDir = dirname($destPath);
            if (!is_dir($destDir)) {
                mkdir($destDir, 0755, true);
            }
            copy($sourcePath, $destPath);
            
            $data['profile_image'] = $path;
        }

        // Handle logo image upload
        if ($request->hasFile('logo_image')) {
            // Delete old logo if exists
            if ($user->logo_image && Storage::disk('public')->exists($user->logo_image)) {
                Storage::disk('public')->delete($user->logo_image);
                // Also delete from public storage
                if (file_exists(public_path('storage/' . $user->logo_image))) {
                    unlink(public_path('storage/' . $user->logo_image));
                }
            }
            
            $file = $request->file('logo_image');
            $filename = time() . '_logo_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('logo', $filename, 'public');
            
            // Copy to public storage for immediate access
            $sourcePath = storage_path('app/public/' . $path);
            $destPath = public_path('storage/' . $path);
            $destDir = dirname($destPath);
            if (!is_dir($destDir)) {
                mkdir($destDir, 0755, true);
            }
            copy($sourcePath, $destPath);
            
            $data['logo_image'] = $path;
        }

        $user->update($data);
        
        // Force save if logo or profile image was removed
        if (($request->has('remove_logo') && $request->remove_logo == '1') || 
            ($request->has('remove_profile_image') && $request->remove_profile_image == '1')) {
            $user->save();
            
            // Clear any caches that might be affecting the display
            \Artisan::call('view:clear');
            \Artisan::call('config:clear');
        }

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}
