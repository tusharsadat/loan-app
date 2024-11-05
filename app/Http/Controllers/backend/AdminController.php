<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile.view');
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user(); // assuming admin is the authenticated user

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);

        // Update profile details
        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');

        // Handle profile image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($admin->image) {
                Storage::delete('public/' . $admin->image);
            }

            // Store the new image
            $path = $request->file('image')->store('profile_images', 'public');
            $admin->image = $path;
        }

        // Save the updated admin data
        $admin->save();
        toastr()->success('Profile updated successfully!');
        return redirect()->back();
    }
}
