<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaseStudiesController extends Controller
{
    public function municipal()
    {
        return view('frontend.case-studies.municipal');
    }

    public function usageBasedBilling()
    {
        return view('frontend.case-studies.usage-based-billing');
    }   

    public function networkMonitoring()
    {
        return view('frontend.case-studies.network-monitoring');
    }

    public function contactCentre()
    {
        return view('frontend.case-studies.contact-centre');
    }
}
