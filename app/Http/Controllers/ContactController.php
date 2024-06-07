<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Prepare email content
        $emailContent = "Name: {$validatedData['name']}\nEmail: {$validatedData['email']}\n\nMessage:\n{$validatedData['message']}";

        // Send the email
        Mail::raw($emailContent, function ($message) use ($validatedData) {
            $message->to('lillybloom211@gmail.com')
                    ->subject($validatedData['subject'])
                    ->from($validatedData['email'], $validatedData['name']);
        });

        return back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
