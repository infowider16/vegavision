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
        try {
            return view('frontend.about');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contact()
    {
        try {
            return view('frontend.contact');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function solutions()
    {
        try {
            return view('frontend.solutions');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function caseStudies()
    {
        try {
            return view('frontend.case-studies');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function insights()
    {
        try {
            return view('frontend.insights');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
