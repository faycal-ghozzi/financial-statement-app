<?php

namespace App\Http\Controllers;

use App\Models\FsEntryPoint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $entries = FsEntryPoint::all();
        return view('admin.fs_entry', compact('entries'));
    }

    public function store(Request $request)
    {
        FsEntryPoint::create($request->all());
        return redirect()->back()->with('success', 'Entry added successfully.');
    }
}
