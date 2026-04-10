<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $team = [
            ['name' => 'Engr. Rolando Fuentes', 'role' => 'Founder & Chief Engineer', 'desc' => 'Over 20 years of experience in electromechanical systems and HVAC design.'],
            ['name' => 'Engr. Dhino Cruz', 'role' => 'Lead HVAC Engineer', 'desc' => 'Specializes in large-scale commercial HVAC design and energy efficiency.'],
            ['name' => 'Engr. Eon Reyes', 'role' => 'Industrial Systems Lead', 'desc' => 'Expert in boiler, chiller, and compressed air systems for industrial clients.'],
            
        ];

        $values = [
            ['icon' => 'shield', 'title' => 'Safety First', 'desc' => 'Every job follows strict safety protocols. We never compromise on the well-being of our team and clients.'],
            ['icon' => 'award', 'title' => 'Quality Work', 'desc' => 'We use only quality parts and proven techniques to ensure lasting results on every project.'],
            ['icon' => 'clock', 'title' => 'Reliability', 'desc' => 'We show up on time, finish on schedule, and follow through on every commitment we make.'],
           
        ];

        return view('pages.about', compact('team', 'values'));
    }
}
