<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'topic' => ['nullable', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:5000'],
            'captcha_confirmed' => ['accepted'],
        ]);

        ContactInquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'topic' => $validated['topic'] ?? 'General',
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Message submitted successfully. Our office will contact you soon.');
    }
}
