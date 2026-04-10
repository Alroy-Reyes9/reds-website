<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = $this->getServices();
        $stats = [
            ['number' => '15+', 'label' => 'Years Experience'],
            ['number' => '500+', 'label' => 'Projects Completed'],
            ['number' => '200+', 'label' => 'Clients Served'],
            ['number' => '24/7', 'label' => 'Support Available'],
        ];

        return view('pages.home', compact('services', 'stats'));
    }

    private function getServices(): array
    {
        return [
            ['icon' => 'snowflake', 'title' => 'Aircon Units', 'slug' => 'aircon', 'desc' => 'Brand new aircon unit supply and installation for residential and commercial spaces.'],
            ['icon' => 'home', 'title' => 'Home Service', 'slug' => 'home-service', 'desc' => 'On-site technician visits for all your cooling and mechanical service needs.'],
            ['icon' => 'wrench', 'title' => 'Maintenance', 'slug' => 'maintenance', 'desc' => 'Scheduled preventive maintenance to keep your equipment running at peak performance.'],
            ['icon' => 'settings', 'title' => 'Repair', 'slug' => 'repair', 'desc' => 'Fast and reliable repair services for all brands and unit types.'],
            ['icon' => 'wind', 'title' => 'Cleaning', 'slug' => 'cleaning', 'desc' => 'Deep cleaning and chemical wash services to improve air quality and efficiency.'],
            ['icon' => 'thermometer', 'title' => 'HVAC', 'slug' => 'hvac', 'desc' => 'Full HVAC design, installation, and commissioning for large-scale projects.'],
            ['icon' => 'ice', 'title' => 'Ice Machine', 'slug' => 'ice-machine', 'desc' => 'Installation, servicing, and repair of commercial ice machines.'],
            ['icon' => 'flame', 'title' => 'Boiler', 'slug' => 'boiler', 'desc' => 'Industrial boiler installation, maintenance, and emergency repair services.'],
            ['icon' => 'cpu', 'title' => 'Chiller', 'slug' => 'chiller', 'desc' => 'Water-cooled and air-cooled chiller systems for commercial facilities.'],
            ['icon' => 'zap', 'title' => 'Compressed Air', 'slug' => 'compressed-air', 'desc' => 'Compressed air systems design and maintenance for industrial applications.'],
            ['icon' => 'battery', 'title' => 'Gen Set', 'slug' => 'gen-set', 'desc' => 'Generator set installation, load testing, and preventive maintenance.'],
            ['icon' => 'shield', 'title' => 'Fire Pump', 'slug' => 'fire-pump', 'desc' => 'Fire pump systems installation and compliance maintenance per NFPA standards.'],
        ];
    }
}
