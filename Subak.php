<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        $message = "Nama: {$validated['nama']}%0A";
        if ($validated['telepon']) {
            $message .= "Telepon: {$validated['telepon']}%0A";
        }
        if ($validated['email']) {
            $message .= "Email: {$validated['email']}%0A";
        }
        $message .= "Subjek: {$validated['subjek']}%0A";
        $message .= "Pesan: {$validated['pesan']}";

        $whatsappUrl = "https://wa.me/6282221298344?text=" . $message;

        return redirect()->away($whatsappUrl);
    }
}
