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

            if ($admin && $admin->type === 'admin') {
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
                'message' => 'L\'indirizzo email è obbligatorio.',
                'status' => 400
            ]);
        }

        $adminData = $this->adminrepository->getOne(['email' => $email]);
        
        if (!$adminData) {
            return response()->json([
                'message' => 'Indirizzo email non trovato.',
                'status' => 404
            ]);
        }

        // Genera password temporanea
        $randomPassword = mt_rand(100000, 999999);
        $hashedPassword = Hash::make($randomPassword);
        
        // Aggiorna password
        $this->adminrepository->update(
            ['id' => $adminData->id], 
            ['password' => $hashedPassword]
        );

        // Prepara e invia l'email
        $mailData = [
            'subject' => 'Reimpostazione della password',
            'email' => $email,
            'user' => $adminData,
            'newPassword' => $randomPassword,
            'body' => '<p>Ciao ' . $adminData->name . ',</p>' .
                      '<p>Hai richiesto la reimpostazione della tua password.</p>' .
                      '<p>La tua nuova password temporanea è: <strong>' . $randomPassword . '</strong></p>' .
                      '<p>Ti consigliamo di cambiarla dopo l\'accesso.</p>'
        ];

        try {
            Mail::to($email)->send(new DemoMail($mailData));
            return response()->json([
                'message' => 'La password è stata reimpostata con successo. Controlla la tua email per la nuova password.',
                'status' => 200
            ]);
        } catch (\Exception $mailException) {
            Log::error('Invio email fallito: ' . $mailException->getMessage());
            return response()->json([
                'message' => 'Errore durante l\'invio dell\'email. Riprova più tardi.',
                'status' => 500
            ]);
        }

    } catch (Exception $e) {
        Log::error("Errore in UserServices.forgetPassword(): " . $e->getMessage());
        return response()->json([
            'message' => 'Si è verificato un errore imprevisto. Riprova più tardi.',
            'status' => 500
        ]);
    }
}

}