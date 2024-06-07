<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SubscriptionMail;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
   

    public function subscribe(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Get the email from the request
        $email = $request->email;

        // Send the email
        Mail::to('lillybloom211@gmail.com')->send(new SubscriptionMail($email));

        // Redirect back with success message and the email
        return back()->with('success', 'Thank you for subscribing. Your email address ' . $email . ' has been added to our mailing list.');
    }
}
