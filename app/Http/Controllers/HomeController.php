<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMenus = Menu::active()->featured()->latest()->take(4)->get();
        $testimonials = Testimonial::published()->latest()->take(3)->get();

        return view('home', compact('featuredMenus', 'testimonials'));
    }
}
