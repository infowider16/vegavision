<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Exception;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class AdminServices
{

    use UploadImageTrait;
    private $dataObject;
    protected $adminrepository;
    protected $userRepository;
    public function __construct(AdminRepository $adminrepository)
    {
        $this->dataObject = new \stdClass();
        $this->adminrepository = $adminrepository;
        // $this->userRepository = $userRepository;
    }

    public function updatePassword($request)
    {
        try {
            $admin = Auth::user(); // ✅ Get the actual user

            if ($admin && $admin->role === 'admin') {
                $admin->password = Hash::make($request->new_password);
                $admin->save();

                return response()->json(['message' => __('message.password_changed'),]);
            } else {
                return response()->json(['message' => 'Access denied. Not an admin user.'], 403);
            }
        } catch (Exception $e) {
            Log::error("UserService : updatePassword()" . $e->getLine() . " " . $e->getMessage());
            return false;
        }
    }

    public function update($request)
    {


        try {
            $user = $this->adminrepository->getOne(['id' => 1]);

            $allData['name'] = $request->name;
            $allData['email'] = $request->email;
            if ($request->password) {
                $allData['password'] = Hash::make($request->password);
            }



            if ($request->hasFile('profile_image')) {

                $allData['profile_image'] = $this->uploadImage($request->file('profile_image'), 'profileImages');
            }

            $data = $this->adminrepository->update(['id' => 1], $allData);

            if ($data) {
                if (isset($allData['profile_image'])) {
                    if ($user->profile_image) {
                        $userPath = storage_path('app/public/');
                        $oldImagePath = $userPath . ($user->profile_image);
                        $protectedImagePath = $userPath . 'profileImages/user-avatar.jpg';
                        if (File::exists($oldImagePath) && $oldImagePath !== $protectedImagePath) {
                            File::delete($oldImagePath);
                        }
                    }
                }

                return response()->json(['message' => __('message.profileUpdate'), 'data' => $data, 'status' => 1, 'error' => $this->dataObject], 201);
            } else {
                return response()->json(['error' => __('message.an_error_occured'), 'data' => $this->dataObject, 'status' => 0]);
            }
        } catch (Exception $e) {

            log::error('Error in AdminServices/update :' . $e->getMessage() . 'in line' . $e->getLine());

            return response()->json(['error' => __('message.an_error_occured'), 'data' => $this->dataObject, 'status' => 0]);
        }
    }


public function forgetPassword($request)
{
    try {
        $email = $request->email;
        
        if (empty($email)) {
            return response()->json([
                'message' => 'Email address is required.',
                'status' => 400
            ]);
        }

        $adminData = $this->adminrepository->getOne(['email' => $email]);
        
        if (!$adminData) {
            return response()->json([
                'message' => 'Email address not found.',
                'status' => 404
            ]);
        }

        // Generate temporary password
        $randomPassword = mt_rand(100000, 999999);
        $hashedPassword = Hash::make($randomPassword);
        
        // Update password
        $this->adminrepository->update(
            ['id' => $adminData->id], 
            ['password' => $hashedPassword]
        );

        // Prepare and send email
        $mailData = [
            'subject' => 'Reset Your Password',
            'email' => $email,
            'user' => $adminData,
            'newPassword' => $randomPassword,
            'body' => '<p>Hello ' . $adminData->name . ',</p>' .
                      '<p>You requested a password reset.</p>' .
                      '<p>Your new temporary password is: <strong>' . $randomPassword . '</strong></p>' .
                      '<p>Please change it after logging in.</p>'
        ];

        try {
            Mail::to($email)->send(new DemoMail($mailData));
            return response()->json([
                'message' => 'Password has been reset successfully. Check your email for the new password.',
                'status' => 200
            ]);
        } catch (\Exception $mailException) {
            Log::error('Email sending failed: ' . $mailException->getMessage());
            return response()->json([
                'message' => 'Error sending email. Please try again later.',
                'status' => 500
            ]);
        }

    } catch (Exception $e) {
        Log::error("Error in UserServices.forgetPassword(): " . $e->getMessage());
        return response()->json([
            'message' => 'An unexpected error occurred. Please try again later.',
            'status' => 500
        ]);
    }
}

}