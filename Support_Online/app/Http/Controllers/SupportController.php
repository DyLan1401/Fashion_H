<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    public function index()
    {
        return view('Support');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Support::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Support request submitted successfully.');
    }
}