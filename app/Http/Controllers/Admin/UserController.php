<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function contactManagement()
    {
        try {
            $data = ContactUs::orderBy('id', 'desc')->get();
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