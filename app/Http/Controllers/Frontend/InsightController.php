<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    public function enterpriseItServiceManagement()
    {
        return view('frontend.insights.service-management');
    }

    public function ispBillingRevenueManagement()
    {
        return view('frontend.insights.isp-billing-blog');
    }

    public function omnichannelContactCentre()
    {
        return view('frontend.insights.omni-channel-blog');
    }

    // Add more methods as you add more insight pages
}
