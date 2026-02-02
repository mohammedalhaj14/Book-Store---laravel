<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
    public function messages()
{
    // Fetch real data from the database
    $messages = \App\Models\Message::latest()->paginate(10);

    return view('admin.messages', compact('messages'));
}
public function storeContact(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // If 'subject' is still required by DB but not in form, 
    // give it a default value here:
    $validated['subject'] = 'General Inquiry';

    \App\Models\Message::create($validated);

    return back()->with('success', 'Message sent successfully!');
}
}
