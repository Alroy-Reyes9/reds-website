<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:120',
            'phone'   => 'required|string|max:30',
            'email'   => 'nullable|email|max:120',
            'service' => 'required|string|max:60',
            'message' => 'required|string|max:3000',
        ]);

        Mail::to(config('mail.admin_address'))->send(new ContactInquiry($data));

        return redirect()->route('contact')
            ->with('success', 'Thank you! We received your inquiry and will get back to you within 24 hours.');
    }
}
