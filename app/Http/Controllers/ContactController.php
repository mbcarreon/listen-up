<?php

namespace App\Http\Controllers;

use App\Notifications\ContactFormMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Recipient;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    //public function submitForm(Request $request)
    public function mailContactForm(ContactFormRequest $message, Recipient $recipient)

    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $recipient->notify(new ContactFormMessage($message));
        return redirect()->back()->with('message', 'Thanks for your message! We will get back to you soon!');

        // Process the form data (you can send emails, store in the database, etc.)
        //dd($request->all());
    }
}
