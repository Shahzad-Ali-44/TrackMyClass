<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            Mail::raw($request->message, function ($mail) use ($request) {
                $mail->to(env('ADMIN_EMAIL')) 
                    ->from($request->email, $request->name)
                    ->subject('Contact Form Submission');
            });

            // Return success response
            return redirect('/contact')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Return error response
            return redirect('/contact')->with('error', 'Failed to send your message. Please try again.');
        }
    }
}
