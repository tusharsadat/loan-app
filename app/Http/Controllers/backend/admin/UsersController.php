<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function allUser()
    {
        $users = User::latest()->get();
        return view('admin.users.all_users', compact('users'));
    }

    public function deleteUser($id)
    {
        // Find the job by its ID
        $user = User::findOrFail($id);

        // Check if the job has an associated image
        if ($user->image) {
            // Delete the image from storage
            Storage::delete('public/' . $user->image);
        }

        // Delete the job from the database
        $user->delete();

        // Redirect back with a success message
        toastr()->success('User delete successfully!');
        return redirect()->back();
    }
}
