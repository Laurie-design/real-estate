<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactPage()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Envoyer l'email (exemple avec Laravel Mail)
        Mail::raw($validatedData['message'], function ($message) use ($validatedData) {
            $message->to('admin@example.com')  // Remplacez par l'email de l'administrateur
                    ->subject('Contact Us Message from ' . $validatedData['name'])
                    ->from($validatedData['email']);
        });

        // Retourner une réponse ou rediriger
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
