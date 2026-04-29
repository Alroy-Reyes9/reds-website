<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()    { return view('pages.home'); }
    public function services(){ return view('pages.services'); }
    public function about()   { return view('pages.about'); }
    public function contact() { return view('pages.contact'); }

    public function book()
    {
        $services = array_map(fn($s) => $s['title'], ServicesController::getAllServices());
        return view('pages.book', compact('services'));
    }

    public function serviceShow(string $slug)
    {
        $allServices = ServicesController::getAllServices();
        $service = $allServices[$slug] ?? abort(404);
        $others = array_filter($allServices, fn($s) => $s['slug'] !== $slug);
        return view('pages.service-detail', compact('service', 'others'));
    }
}
