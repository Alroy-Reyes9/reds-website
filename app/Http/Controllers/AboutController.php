<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $team = [
            ['name' => 'Engr. Roland Fuentes', 'role' => 'Founder & Chief Engineer', 'desc' => 'Over 20 years of experience in electromechanical systems and HVAC design.'],
            ['name' => 'Engr. Romie', 'role' => 'Lead Technician', 'desc' => 'Specializes in large-scale commercial HVAC design and energy efficiency.'],
            ['name' => 'Engr. Dhino Cruz', 'role' => 'Industrial Systems Lead', 'desc' => 'Expert in boiler, chiller, and compressed air systems for industrial clients.'],
            ['name' => 'Engr. Eon Reyes', 'role' => 'Service Operations Manager', 'desc' => 'Manages field technician teams and ensures quality of all service deliveries.'],
        ];

        $values = [
            ['icon' => 'shield', 'title' => 'Safety First', 'desc' => 'Every job follows strict safety protocols. We never compromise on the well-being of our team and clients.'],
            ['icon' => 'award', 'title' => 'Quality Work', 'desc' => 'We use only quality parts and proven techniques to ensure lasting results on every project.'],
            ['icon' => 'clock', 'title' => 'Reliability', 'desc' => 'We show up on time, finish on schedule, and follow through on every commitment we make.'],
            ['icon' => 'users', 'title' => 'Client Focus', 'desc' => 'Your satisfaction drives every decision. We listen, advise honestly, and deliver what you need.'],
        ];

        return view('pages.about', compact('team', 'values'));
    }
}
