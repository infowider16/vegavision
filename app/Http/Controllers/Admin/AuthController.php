<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\{AdminLoginRequest, UpdatePasswordRequest, UpdateAdminProfileRequest};
use Illuminate\Support\Facades\Log;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Services\Admin\AdminServices;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $dataObject;
    protected $AdminServices;
    protected $userRepository;
    public function __construct(AdminServices $AdminServices)
    {
        $this->dataObject = new \stdClass();
        $this->AdminServices = $AdminServices;
        // $this->userRepository = $userRepository;
    }
    public function index()
    {
        try {
            if (Auth::check() && Auth::user()->type === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return view('admin.login');
        } catch (Exception $e) {
            Log::error("AuthController : index()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }

    public function login(AdminLoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->role === 'admin') {
                    return response()->json(['redirect' => route('admin.dashboard')]);
                } else {
                    Auth::logout();
                    return response()->json([
                        'errors' => ['email' => ['Access denied. Not an admin user']]
                    ], 403);
                }
            }

            return response()->json([
                'errors' => ['email' => ['Invalid credentials']]
            ], 422);
        } catch (Exception $e) {
            Log::error("AuthController : login()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }

    public function update(UpdateAdminProfileRequest $request)
    {
        try {
            return $this->AdminServices->update($request);
        } catch (Exception $e) {
            Log::error("AuthController : changePassword()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        try {
            return $this->AdminServices->updatePassword($request);
        } catch (Exception $e) {
            Log::error("AuthController : changePassword()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }

    public function sendForgotPasswordEmail(Request $request)
    {
        try {

            if (!empty($request->email)) {
                $rules = [
                    'email'      => 'required|email',
                ];
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['status' => 0, 'message' =>  __('message.validation_failed'), 'errors' => $validator->errors()], 422);
            }

            return $this->AdminServices->forgetPassword($request);
        } catch (Exception $e) {
            log::error('Error in AuthController/sendForgotPasswordEmail :' . $e->getMessage() . 'in line' . $e->getLine());
            return response()->json(['status' => 0, 'message' => __('message.statusZero')]);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('admin.login');
        } catch (Exception $e) {
            Log::error("AuthController : logout()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }



}
