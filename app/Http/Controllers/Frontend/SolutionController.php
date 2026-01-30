<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function contactCentreOmnichannel()
    {
         return view('frontend.solutions.contact-centre-omnichannel');
    }

    public function itServiceManagement()
    {
        return view('frontend.solutions.it-service-management');
    }

    public function customSoftware()
    {
        return view('frontend.solutions.custom-software');
    }

    public function billingRevenueManagement()
    {
         return view('frontend.solutions.billing-revenue-management');
    }

    public function crmPlatforms()
    {
       return view('frontend.solutions.crm-platforms');
    }

    public function ispWifiPlatforms()
    {
        return view('frontend.solutions.isp-wifi-platforms');
    }

    public function networkMonitoring()
    {
        return view('frontend.solutions.network-monitoring');
    }

    public function dataBi()
    {
            return view('frontend.solutions.data-bi');
    }

    public function systemsIntegrationAutomation()
    {
         return view('frontend.solutions.systems-integration-automation');
    }

    public function managedSaas()
    {
        return view('frontend.solutions.managed-saas');
    }
}
