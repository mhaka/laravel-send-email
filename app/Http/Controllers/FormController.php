<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'text' => 'required',
            'datetime' => 'required|date',
        ],[
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'text.required' => 'The text field is required.',
        'datetime.required' => 'The datetime field is required.',
        'datetime.date' => 'Please enter a valid date.',
    ]);

        // event
        event(new \App\Events\SendEmailEvent($validatedData));

        // Store the event as a notification in the database
        Notification::create([
            'event' => 'SendEmailEvent',
            'data' => json_encode($validatedData),
        ]);

        return redirect('/')->with('success', 'Email sent successfully!');
    }
}
