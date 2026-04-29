<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public static function getAllServices(): array
    {
        return [
            'aircon' => [
                'icon' => 'snowflake',
                'title' => 'Brand New Aircon Units',
                'slug' => 'aircon',
                'category' => 'Cooling',
                'short' => 'Supply and installation of brand new aircon units.',
                'desc' => 'We supply and install a wide range of brand new air conditioning units from trusted brands. Whether for a single room, office, or full building, our certified technicians ensure proper sizing, installation, and commissioning.',
                'features' => ['All major brands available', 'Free site inspection', 'Warranty-backed installation', 'Post-installation checkup'],
            ],
            'home-service' => [
                'icon' => 'home',
                'title' => 'Home Service',
                'slug' => 'home-service',
                'category' => 'On-Site',
                'short' => 'On-site technician visits for all your needs.',
                'desc' => 'Our technicians come directly to your home or business. No need to haul equipment — we bring the tools, expertise, and spare parts to get the job done on-site.',
                'features' => ['Same-day response available', 'Certified technicians', 'Transparent pricing', 'Service warranty'],
            ],
            'maintenance' => [
                'icon' => 'wrench',
                'title' => 'Preventive Maintenance',
                'slug' => 'maintenance',
                'category' => 'Maintenance',
                'short' => 'Scheduled PM to keep equipment at peak performance.',
                'desc' => 'Avoid costly breakdowns with our scheduled preventive maintenance programs. We create customized PM schedules for residential, commercial, and industrial clients.',
                'features' => ['Annual / quarterly contracts', 'Detailed inspection reports', 'Parts replacement advisory', 'Priority service scheduling'],
            ],
            'repair' => [
                'icon' => 'settings',
                'title' => 'Repair Services',
                'slug' => 'repair',
                'category' => 'Repair',
                'short' => 'Fast, reliable repair for all brands and types.',
                'desc' => 'From minor fixes to major overhauls, our repair team handles all types of equipment. We diagnose quickly and provide honest assessments before proceeding with any repair.',
                'features' => ['All brands serviced', 'Genuine spare parts', 'Repair warranty', 'Emergency repair available'],
            ],
            'cleaning' => [
                'icon' => 'wind',
                'title' => 'Cleaning Services',
                'slug' => 'cleaning',
                'category' => 'Maintenance',
                'short' => 'Deep cleaning and chemical wash for better efficiency.',
                'desc' => 'Dirty coils and filters reduce efficiency and air quality. Our cleaning services — including chemical wash and deep clean — restore your unit\'s performance and extend its lifespan.',
                'features' => ['Chemical wash available', 'Coil and filter cleaning', 'Drain pan treatment', 'Odor elimination'],
            ],
            'hvac' => [
                'icon' => 'thermometer',
                'title' => 'HVAC Systems',
                'slug' => 'hvac',
                'category' => 'Installation',
                'short' => 'Full HVAC design, installation, and commissioning.',
                'desc' => 'We handle complete HVAC projects from design to commissioning. Our engineers assess your space, design the optimal system, and install it with precision — ensuring comfort, efficiency, and code compliance.',
                'features' => ['Load computation & design', 'Ductwork fabrication', 'BAS/controls integration', 'Commissioning & handover'],
            ],
            'ice-machine' => [
                'icon' => 'ice',
                'title' => 'Ice Machine',
                'slug' => 'ice-machine',
                'category' => 'Specialty',
                'short' => 'Installation and servicing of commercial ice machines.',
                'desc' => 'Commercial ice machines require specialized care. We install, maintain, and repair all types of ice machines for restaurants, hotels, hospitals, and food processing facilities.',
                'features' => ['Modular & flake ice types', 'Water system integration', 'Sanitation compliance', 'Preventive maintenance plans'],
            ],
            'boiler' => [
                'icon' => 'flame',
                'title' => 'Boiler Services',
                'slug' => 'boiler',
                'category' => 'Industrial',
                'short' => 'Industrial boiler installation, maintenance, and repair.',
                'desc' => 'Boilers are critical systems that demand expert handling. Our engineers are trained in fire-tube and water-tube boiler systems, providing installation, routine maintenance, and emergency repair.',
                'features' => ['Fire-tube & water-tube boilers', 'Safety valve testing', 'Combustion analysis', 'DOLE compliance support'],
            ],
            'chiller' => [
                'icon' => 'cpu',
                'title' => 'Chiller Systems',
                'slug' => 'chiller',
                'category' => 'Cooling',
                'short' => 'Water-cooled and air-cooled chiller systems.',
                'desc' => 'We specialize in chiller system installation, maintenance, and retrofitting for large commercial and industrial facilities. Our team handles centrifugal, screw, and scroll chillers.',
                'features' => ['Centrifugal, screw & scroll types', 'Cooling tower integration', 'Energy efficiency audits', 'Leak detection & recharge'],
            ],
            'compressed-air' => [
                'icon' => 'zap',
                'title' => 'Compressed Air Systems',
                'slug' => 'compressed-air',
                'category' => 'Industrial',
                'short' => 'Compressed air design and maintenance for industry.',
                'desc' => 'From compressor selection to piping layout and filtration systems, we design and maintain compressed air systems that meet your operational requirements and efficiency targets.',
                'features' => ['System design & sizing', 'Piping & distribution', 'Air dryer & filter systems', 'Leak detection audits'],
            ],
            'gen-set' => [
                'icon' => 'battery',
                'title' => 'Generator Set (Gen Set)',
                'slug' => 'gen-set',
                'category' => 'Power',
                'short' => 'Generator set installation, load testing, and PM.',
                'desc' => 'Reliable backup power is non-negotiable. We supply, install, and maintain diesel and gas generator sets for residential, commercial, and industrial applications.',
                'features' => ['Supply & installation', 'Load bank testing', 'ATS panel setup', 'Scheduled PM contracts'],
            ],
            'fire-pump' => [
                'icon' => 'shield',
                'title' => 'Fire Pump Systems',
                'slug' => 'fire-pump',
                'category' => 'Safety',
                'short' => 'Fire pump installation and compliance maintenance.',
                'desc' => 'Fire pump systems are life-safety critical. We install and maintain jockey, electric, and diesel fire pumps in compliance with NFPA 20 and local BFP requirements.',
                'features' => ['Electric & diesel fire pumps', 'Jockey pump systems', 'Flow & pressure testing', 'BFP compliance documentation'],
            ],
        ];
    }

    public function index()
    {
        $services = $this->getAllServices();
        $categories = array_unique(array_column($services, 'category'));
        return view('pages.services', compact('services', 'categories'));
    }

    public function show(string $slug)
    {
        $services = $this->getAllServices();
        $service = $services[$slug] ?? abort(404);
        $others = array_filter($services, fn($s) => $s['slug'] !== $slug);
        return view('pages.service-detail', compact('service', 'others'));
    }
}
