<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $details = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'message' => 'required',
        ]);

        Mail::send('emails.contactform', ['details' => $details], function ($message) use ($details) {
            $message->to('client@centralsushi.fr')
                    ->subject('Soumission du formulaire de contact');
        });

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}