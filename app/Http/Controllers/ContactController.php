<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    private array $services = [
        'aircon' => 'Brand New Aircon Units',
        'home-service' => 'Home Service',
        'maintenance' => 'Preventive Maintenance',
        'repair' => 'Repair Services',
        'cleaning' => 'Cleaning Services',
        'hvac' => 'HVAC Systems',
        'ice-machine' => 'Ice Machine',
        'boiler' => 'Boiler Services',
        'chiller' => 'Chiller Systems',
        'compressed-air' => 'Compressed Air Systems',
        'gen-set' => 'Generator Set',
        'fire-pump' => 'Fire Pump Systems',
    ];

    public function index()
    {
        return view('pages.contact', ['services' => $this->services]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'service' => 'nullable|string|max:100',
            'message' => 'required|string|min:10|max:2000',
        ]);

        Inquiry::create(array_merge($validated, ['type' => 'contact', 'status' => 'pending']));

        return redirect()->route('contact')
            ->with('success', 'Thank you! Your message has been received. We will get back to you shortly.');
    }

    public function book()
    {
        return view('pages.book', ['services' => $this->services]);
    }

    public function bookStore(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:20',
            'service'        => 'required|string|max:100',
            'address'        => 'required|string|max:500',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string|max:50',
            'message'        => 'nullable|string|max:1000',
        ]);

        Inquiry::create(array_merge($validated, ['type' => 'booking', 'status' => 'pending']));

        return redirect()->route('book')
            ->with('success', 'Booking request received! Our team will confirm your schedule within 24 hours.');
    }
}
