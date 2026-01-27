<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CountryRepository;
use App\Requests\ContactFormRequest;
use App\Services\Frontend\HomeService;

class HomeControllers extends Controller
{

    protected $countryRepository;
    protected $homeService;

    public function __construct(CountryRepository $countryRepository, HomeService $homeService)
    {
        $this->countryRepository = $countryRepository;
        $this->homeService = $homeService;
    }

    public function index()
    {
        try {
            return view('frontend.home');
        } catch (Exception $e) {
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
            $countryCodes = $this->countryRepository->getAll();
            return view('frontend.contact', compact('countryCodes'));
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

    public function submitContactForm(ContactFormRequest $request)
    {
        try {

            $validatedData = $request->validated();
            return $this->homeService->storeContactFormData($validatedData);
            
        } catch (Exception $e) {
            return response()->json(['status' => '0', 'message' => __('An error occurred while submitting the form.')]);
        }
    }

}
