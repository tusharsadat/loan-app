<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUser()
    {
        $users = User::latest()->get();
        return view('admin.users.all_users', compact('users'));
    }
}
