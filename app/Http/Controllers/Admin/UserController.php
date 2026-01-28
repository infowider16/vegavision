<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Repositories\Eloquent\ContactFormRepository;

class UserController extends Controller
{
    protected $contactFormRepository;

    public function __construct(ContactFormRepository $contactFormRepository)
    {
        $this->contactFormRepository = $contactFormRepository;
    }
    public function contactManagement()
    {
        try {
           $data = $this->contactFormRepository->all("*");
            return view('admin.contact-management', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error in class ' . __CLASS__ .
                ' method ' . __METHOD__ .
                ' line ' . __LINE__ .
                ' message ' . $e->getMessage());
            return response()->json([
                'status'  => 0,
                'error'   => $e->getMessage(),
                'data'    => [],
                'message' => 'Something went wrong'
            ]);
        }
    }
}
