<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitContact(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Create a new Appeal instance
        $appeal = new Appeal();
        $appeal->name = $validatedData['name'];
        $appeal->email = $validatedData['email'];
        $appeal->phone = $validatedData['phone'];
        $appeal->subject = 'appeal'; // Set the subject default value
        $appeal->message = $validatedData['message'];

        // Save the Appeal instance
        $appeal->save();

        // Redirect back or to a success page
        return redirect()->route('contact')->with('success', 'Message submitted successfully!');
    }
}
