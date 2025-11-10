<?php

namespace App\Http\Controllers;

use App\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(20);

        return view('admin.users', [
            'users' => $users,
        ]);
    }
}
