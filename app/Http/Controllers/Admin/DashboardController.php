<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Repositories\Eloquent\SiteSettingRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
use App\Services\Admin\AdminServices;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    protected $siteSettingRepo;
    protected $AdminServices;
    public function __construct(AdminServices $AdminServices, SiteSettingRepository $siteSettingRepo)
    {
        $this->siteSettingRepo = $siteSettingRepo;
        $this->AdminServices = $AdminServices;
    }
    public function index()
    {
        try {
            return view('admin.dashboard');
        } catch (Exception $e) {
            Log::error("AuthController : index()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }
    public function profile()
    {
        try {
            $settings = $this->siteSettingRepo->getAllSettings();
            return view('admin.profile', compact('settings'));
        } catch (Exception $e) {
            Log::error("AuthController : profile()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }
    public function siteSettingsUpdate(Request $request)
    {
        try {
            $data = $request->only(['address', 'phone', 'email', 'facebook', 'instagram', 'linkedin', 'twitter', 'pinterest', 'google']);
            $this->siteSettingRepo->updateSettings($data);
            return response()->json(['status' => true, 'message' => __('message.statusTwo', ['parameter' => 'Site settings'])]);
        } catch (Exception $e) {
            Log::error("AuthController : index()" . $e->getLine() . " " . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => __('message.some_thing_went_wrong')]);
        }
    }
}
