<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class SuggetsController extends Controller
{
    public function submitSugget(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new Appeal instance
        $appeal = new Appeal();
        $appeal->name = $validatedData['name'];
        $appeal->email = $validatedData['email'];
        $appeal->subject = 'suggestion'; // Set the subject default value
        $appeal->message = $validatedData['message'];

        // Save the Appeal instance
        $appeal->save();

        // Redirect back or to a success page
        return redirect()->route('suggest')->with('success', 'Message submitted successfully!');
    }
}
