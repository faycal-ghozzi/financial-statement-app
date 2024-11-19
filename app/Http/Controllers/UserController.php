<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.financial_statements');
    }

    public function submit(Request $request)
    {
        // Handle user-submitted financial statement
        return redirect()->back()->with('success', 'Statement submitted successfully.');
    }
}
