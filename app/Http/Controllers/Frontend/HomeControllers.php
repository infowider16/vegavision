<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function index()
    {
        try{
            return view('frontend.home');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function solutions()
    {
        return view('frontend.solutions');
    }

    public function caseStudies()
    {
        return view('frontend.case-studies');
    }

    public function insights()
    {
        return view('frontend.insights');
    }

    // Add more methods as needed for other pages
}
