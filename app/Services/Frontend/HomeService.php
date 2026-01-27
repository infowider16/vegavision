<?php

namespace App\Services\Frontend;

use App\Repositories\Eloquent\ContactFormRepository;
use Exception;

class HomeService
{
    protected $contactFormRepository;

    public function __construct(ContactFormRepository $contactFormRepository)
    {
        $this->contactFormRepository = $contactFormRepository;
    }

    public function storeContactFormData(array $data)
    {
        try {
            $data = $this->contactFormRepository->create($data);
            if($data){
                return response()->json(['status' => '2', 'message' => "Thank you for your message. We will contact you soon."]);    
            }else{
                return response()->json(['status' => '0', 'message' => "An error occurred while submitting the form."]);
            }
        } catch (Exception $e) {
            throw new Exception(__('Failed to store contact form data.'));
        }
    }
}
