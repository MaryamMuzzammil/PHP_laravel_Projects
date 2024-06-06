<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Send the email
        $email = $request->email;
        Mail::to('your-email@example.com')->send(new SubscriptionMail($email));

        // Optionally, you can redirect the user back with a success message
        return back()->with('success', 'Subscription successful.');
    }
}
