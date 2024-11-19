<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('status', 'pending')->get();
        return view('admin.manage_access', compact('pendingUsers'));
    }

    public function approve(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = 'approved';
        $user->save();

        return redirect()->back()->with('success', 'User approved.');
    }

    public function deny(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = 'denied';
        $user->save();

        return redirect()->back()->with('success', 'User denied.');
    }
}
