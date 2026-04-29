<?php

namespace App\Http\Controllers;

use App\Mail\BookingInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:120',
            'phone'          => 'required|string|max:30',
            'email'          => 'required|email|max:120',
            'address'        => 'required|string|max:500',
            'service'        => 'required|string|max:60',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string|max:30',
            'message'        => 'nullable|string|max:3000',
        ]);

        Mail::to(config('mail.admin_address'))->send(new BookingInquiry($data));

        return redirect()->route('book')
            ->with('success', 'Thank you! Your booking request has been received. We will confirm your appointment within 24 hours.');
    }
}
