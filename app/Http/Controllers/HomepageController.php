<?php

namespace App\Http\Controllers;

use App\Models\Admin\Plan;
use App\Models\Owner\Testimonial;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $testimonials = Testimonial::where('approved', 1)->latest()->paginate(6);

        return view('homepage.index', compact('plans', 'testimonials'));
    }

    public function faq()
    {
        return view('homepage.faq');
    }
}
