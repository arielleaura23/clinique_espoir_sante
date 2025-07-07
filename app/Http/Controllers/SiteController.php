<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactQuery;
use App\Models\NewsletterSubscriber;

class SiteController extends Controller
{
    public function sendContact(Request $request)
    {
        try {
            ContactQuery::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'contactno' => $request->contactno ?? 'Non précisé',
                'message' => $request->message,
                'PostingDate' => now(),
                'IsRead' => 0,
            ]);

            return back()->with('success', 'Votre message a été envoyé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', "Une erreur s'est produite. Veuillez réessayer.");
        }
    }

    public function subscribeNewsletter(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:newsletter_subscribers,email',
    ]);

    try {
        NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Inscription à la newsletter réussie.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
    }
}
}
