<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Services\Admin\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function contactManagement(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->userServices->getContactManagementData($request);
            }

            return view('admin.contact-management');
        } catch (\Exception $e) {
            Log::error('Error in ' . __METHOD__ . ': ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Something went wrong',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    }
}
