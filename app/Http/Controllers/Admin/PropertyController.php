<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\PropertyRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Admin\PlanServices;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyDeletedNotification;
use App\Mail\PropertyApprovedNotification;
use App\Mail\PropertyRejectedNotification;

class PropertyController extends Controller
{
    protected $PropertyRepository;
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository,PropertyRepository $PropertyRepository)
    {
        $this->PropertyRepository = $PropertyRepository;
        $this->userRepository = $userRepository;
    }

public function propertyList()
{
    if (request()->ajax()) {
        $properties = $this->PropertyRepository->getByWhere(['status' => ['!=', 'Approved']]);
        // dd($properties);
        
        return DataTables::of($properties)
            ->addIndexColumn()
            ->addColumn('action', function($data) {
                $buttons = '';
                
                if ($data->status === 'Pending For Approval') {
                    $buttons .= '<button type="button" class="btn-one btn-success btn-sm update-status" data-id="' . $data->id . '" data-update-status="Approved">Approve</button>';
                    $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $data->id . '" data-update-status="Rejected">Reject</button>';
                } elseif ($data->status === 'Approved') {
                    $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $data->id . '" data-update-status="Rejected">Reject</button>';
                } elseif ($data->status === 'Rejected') {
                    // $buttons .= '<button type="button" class="btn-one btn-success btn-sm update-status" data-id="' . $data->id . '" data-update-status="Approved">Approve</button>';
                }
                
                $buttons .= '<a href="'.route('admin.property.Detail', $data->id).'" class="btn-one btn-info btn-sm">View</a>';
                // delete button
                $buttons .= '<button type="button" class="btn-one btn-danger btn-sm delete-property" data-id="' . $data->id . '">Delete</button>';
                
                return '<div class="d-flex align-items-center gap-2 flex-wrap">'.$buttons.'</div>';
            })
            ->editColumn('price', function($data) {
                return env('DEFAULT_CURRENCY') . number_format($data->price, 2);
            })
           ->editColumn('status', function($data) {
    if ($data->status === 'Rejected' && !empty($data->rejection_reason)) {
        $fullReason = $data->rejection_reason;
        $shortReason = \Illuminate\Support\Str::limit($fullReason, 20);

        // Only show "Read More" if reason length is greater than 20
        $readMoreButton = '';
        if (\Illuminate\Support\Str::length($fullReason) > 20) {
            $readMoreButton = <<<HTML
                <br>
                <button type="button" class="btn btn-link p-0 m-0 text-primary read-reason" data-reason="{$fullReason}">Read More</button>
            HTML;
        }

        return <<<HTML
            <div>
                <span class="badge bg-danger">Rejected</span>
                <br>
                <small>{$shortReason}</small>
                {$readMoreButton}
            </div>
        HTML;
    }

    return '<span class="badge bg-success">'.$data->status.'</span>';
})


            ->editColumn('user.name', function($data) {
                return $data->user->name ?? 'Paid';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
    
    return view('admin.property-listing');
}

public function approvedPropertyList(Request $request){
     if (request()->ajax()) {
        $properties = $this->PropertyRepository->getByWhere(['status' => 'Approved']);
        
        
        return DataTables::of($properties)
            ->addIndexColumn()
            ->addColumn('action', function($data) {
                $buttons = '';
               
                $buttons .= '<a href="'.route('admin.property.Detail', $data->id).'" class="btn-one btn-info btn-sm">View</a>';
                
                return '<div class="d-flex align-items-center gap-2 flex-wrap">'.$buttons.'</div>';
            })
            ->editColumn('price', function($data) {
                return env('DEFAULT_CURRENCY') . number_format($data->price, 2);
            })
            ->editColumn('user.name', function($data) {
                return $data->user->name ?? 'Paid';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    return view('admin.approved-property-listing');
}
    public function show(Request $request, $id)
    {

        try {
            if ($request->has('notification_id')) {
                $this->userRepository->readNotifications(
                    [
                        'id'       => $request->notification_id,
                        'user_id'  => 0,
                    ],
                    [
                        'is_read' => true
                    ]
                );
            }
            $property = $this->PropertyRepository->getOne(['id' => $id]);
            // dd($user);
            if ($property) {
                return view('admin.property-detail', compact('property'));
            }
        } catch (\Exception $e) {
            Log::error('Toggle property detail Status Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => __('message.some_thing_went_wrong')], 500);
        }
    }

   public function updatePropertyStatus(Request $request, $id)
{
    try {
        $data = $request->except('_token');
        $this->PropertyRepository->update(['id' => $id], $data);
        $property = $this->PropertyRepository->getOne(['id' => $id]);
        
        // Send appropriate email notification based on status
        if ($request->status == 'Approved') {
            
            Mail::to($property->user->email)
                ->send(new PropertyApprovedNotification($property));
        } 
        elseif ($request->status == 'Rejected') {
            // $property->user->email
            Mail::to($property->user->email)
                ->send(new PropertyRejectedNotification($property, $request->rejection_reason));
        }

        return response()->json([
            'status' => true, 
            'message' => 'Property status updated successfully'
        ], 200);
    } catch (\Exception $e) {
        Log::error('Error in PropertyController.updatePropertyStatus(): ' . $e->getMessage());
        return response()->json([
            'status' => false, 
            'message' => __('message.some_thing_went_wrong'),
            'error' => $e->getMessage(), 
            'data' => []
        ], 500);
    }
}

public function destroy(Request $request, $id)
{
    try {
        $id = $id;
        $property = $this->PropertyRepository->getOne(['id' => $id]);
        $email = $property->user->email;
        $reason = $request->reason;
        
        // Send notification email before deletion
        Mail::to($email)->send(new PropertyDeletedNotification($property, $reason));
        
        $this->PropertyRepository->delete(['id' => $id]);
        return response()->json([
            'status' => true, 
            'message' => 'Property deleted successfully'
        ], 200);
    } catch (\Exception $e) {
        Log::error('Error in PropertyController.destroy(): ' . $e->getMessage());
        return response()->json([
            'status' => false, 
            'message' => __('message.some_thing_went_wrong'), 
            'error' => $e->getMessage(), 
            'data' => []
        ], 500);
    }
}

}