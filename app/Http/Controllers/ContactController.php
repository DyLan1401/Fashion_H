<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contact::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%") ;
            });
        }
        $contacts = $query->latest()->paginate(10)->withQueryString();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            ['name' => 'required|regex:/^[\pL\s]+$/u',new \App\Rules\NoLeadingOrTrailingSpaces],
            'email' => 'required|email ',
            ['phone' => 'required|min:10|max:12 ',new \App\Rules\NoLeadingOrTrailingSpaces],
            'message' => 'required|string|max:255 ',
        ]);
        Contact::create($request->only('name', 'email', 'message','phone'));
        return redirect()->route('contact.form')->with('success', 'Gửi liên hệ thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Đã xóa liên hệ!');
    }
}
