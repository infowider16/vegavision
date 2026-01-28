<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Log;
use Exception;
use App\Repositories\Eloquent\ContactFormRepository;
use Yajra\DataTables\Facades\DataTables;

class UserServices
{
    protected $contactFormRepository;

    public function __construct(ContactFormRepository $contactFormRepository)
    {
        $this->contactFormRepository = $contactFormRepository;
    }

    public function getContactManagementData($request)
    {
        try {
            $query = $this->contactFormRepository->query()
                ->select(['id', 'name', 'email', 'country_code', 'phone', 'organization', 'message', 'created_at']);

            return DataTables::of($query)

                ->addColumn('action', function ($row) {
                    $fullPhone = trim('+' . $row->country_code . ' ' . $row->phone);
                    return '
                <button type="button"
                    class="btn btn-sm btn-primary view-message"
                    data-name="' . e($row->name) . '"
                    data-email="' . e($row->email) . '"
                    data-phone="' . e($fullPhone) . '"
                    data-organization="' . e($row->organization) . '"
                    data-message="' . e($row->message) . '"
                    data-date="' . e(optional($row->created_at)->format('d M g:i A')) . '">
                    View
                </button>';
                })

                ->editColumn('phone', function ($row) {
                    return trim('+' . $row->country_code . ' ' . $row->phone);
                })

                ->editColumn('created_at', function ($row) {
                    return optional($row->created_at)->format('d M g:i A');
                })

                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('Error in ' . __METHOD__ . ': ' . $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
