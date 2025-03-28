<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            // Get input using Laravel's request helper
            $name = trim($request->input('name'));
            $email = trim($request->input('email'));
            $message = trim($request->input('message'));

            // Send data to Web3Forms API
            $response = Http::post('https://api.web3forms.com/submit', [
                'access_key' => config('services.web3forms.access_key'), // Use config
                'name' => $name,
                'email' => $email,
                'message' => $message,
                'subject' => 'New Contact Form Submission from TrackMyClass',
                'website' => 'TrackMyClass',
            ]);

            // Check API response safely
            if (isset($response->json()['success']) && $response->json()['success']) {
                return redirect('/contact')->with('success', 'Your message has been sent successfully!');
            } else {
                return redirect('/contact')->with('error', 'Failed to send your message. Please try again.');
            }

        } catch (\Exception $e) {
            return redirect('/contact')->with('error', 'An error occurred. Please try again.');
        }
    }
}
