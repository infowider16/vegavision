<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserStatusNotification;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;
use App\Models\Comment;


class UserController extends Controller
{
    protected $siteSettingRepo;
    protected  $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {

        $this->UserRepository = $UserRepository;
    }

    public function index()
    {
        return view('admin.user-list');
    }


    public function userList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $users = User::query()->where('email_verified_at', '!=', null)->where('status', '!=', 'approved')->orderBy('id', 'desc'); // Eloquent query for fresh data

                return DataTables::of($users)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('d M Y h:i A');
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status === 'approved') {
                            // Green badge for approved
                            return '<span class="badge bg-success">Approved</span>';
                        }

                        if ($data->status === 'pending') {
                            // Red badge for blocked
                            return '<span class="badge bg-warning">Pending</span>';
                        }

                        if ($data->status === 'rejected' && !empty($data->reject_reason)) {
                            $fullReason = $data->reject_reason;
                            $shortReason = \Illuminate\Support\Str::limit($fullReason, 20);

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

                        // Yellow badge for pending or any other status
                        return '<span class="badge bg-warning">' . ucfirst($data->status) . '</span>';
                    })

                    ->addColumn('action', function ($row) {
                        $buttons = '';

                        if ($row->status === 'pending') {
                            $buttons .= '<button type="button" class="btn-one btn-success btn-sm update-status" data-id="' . $row->id . '" data-update-status="approved">Approve</button>';
                            $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $row->id . '" data-update-status="rejected">Reject</button>';
                        } elseif ($row->status === 'approved') {
                            $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $row->id . '" data-update-status="rejected">Reject</button>';
                        } elseif ($row->status === 'rejected') {
                            $buttons .= '<button type="button" class="btn-one btn-success btn-sm update-status" data-id="' . $row->id . '" data-update-status="Approved">Approve</button>';
                        }

                        $viewBtn = '<a href="' . route('admin.user.Detail', $row->id) . '" class="btn-one btn-info mb-2">View</a>';



                        return $viewBtn . ' ' . $buttons;
                    })


                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }

            return view('admin.user-list');
        } catch (Exception $e) {
            Log::error('User List Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => __('message.some_thing_went_wrong')], 500);
        }
    }
    public function makePaid(Request $request)
    {
        try {
            $user = $this->UserRepository->findByWhere(['id' => $request->id]);
            $user->is_cancelled = '0';
            $user->cancelled_date = null;
            if ($request->paid) {
                $user->is_subscribed = '1';
                $user->expired_date = now()->addYear();
            } else {
                $user->is_subscribed = '0';
                $user->expired_date = null;
            }


            $user->save();

            return response()->json([
                'status' => true,
                'message' => $request->paid
                    ? 'User has been marked as paid successfully!'
                    : 'User has been marked as unpaid successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Make Paid Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 500);
        }
    }
    public function toggleStatus(Request $request)
    {


        try {
            $user = $this->UserRepository->findByWhere(['id' => $request->user_id]);
            // dd($user);
            if (!$user) {
                return response()->json(['status' => false, 'message' => __('message.user_not_found')], 404);
            }

            $data = $this->UserRepository->updateStatus($request->user_id, $request->status);


            $messageKey = $request->status === '1' ? 'unblock' : 'block';
            $message = __('message.' . $messageKey);
            if ($data) {
                return response()->json(['status' => true, 'message' => $message]);
            }
        } catch (\Exception $e) {
            Log::error('Toggle User Status Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => __('message.some_thing_went_wrong')], 500);
        }
    }

    public function show(Request $request, $id)
    {

        try {
            $user = $this->UserRepository->findByWhere(['id' => $id]);
        //    dd($user);
            if ($user) {
                return view('admin.user-detail', compact('user'));
            }
        } catch (\Exception $e) {
            Log::error('Toggle User Status Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => __('message.some_thing_went_wrong')], 500);
        }
    }

    public function updateUserStatus(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            $this->UserRepository->update($id, $data);
            $user = $this->UserRepository->findByWhere(['id' => $id]);

            // Send appropriate email notification based on status
            if ($request->status == 'approved') {
                $mailData = [
                    'subject' => 'Account Approved',
                    'user' => $user,
                    'body' => 'Your account has been approved. You can now login and access all features.',
                    'actionText' => 'Login to Your Account',
                    'actionUrl' => route('login'),
                ];

                $mail =   Mail::to($user->email)
                    ->send(new UserStatusNotification($mailData));

                // dd($mail);
            } elseif ($request->status == 'rejected') {
                $mailData = [
                    'subject' => 'Account Rejected',
                    'user' => $user,
                    'body' => 'Your account has been rejected. Reason: ' . $request->reject_reason,
                    'actionText' => 'You can edit and resubmit your application',
                    'actionUrl' => route('login'),
                ];

                Mail::to($user->email)
                    ->send(new UserStatusNotification($mailData));
            }

            return response()->json([
                'status' => true,
                'message' => 'User status updated successfully'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error in UserController.updateUserStatus(): ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => __('message.some_thing_went_wrong'),
                'error' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
    public function approvedUserList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $users = User::query()->where('email_verified_at', '!=', null)->where('status', 'approved')->orderBy('id', 'desc'); // Eloquent query for fresh data

                return DataTables::of($users)
                    ->addIndexColumn()
                    ->addColumn('paid_status', function ($row) {
                        $checked = (!empty($row->expired_date) && \Carbon\Carbon::now()->lt(\Carbon\Carbon::parse($row->expired_date)))
                            ? 'checked'
                            : '';

                        return '<div class="form-check mt-2">
                    <input class="form-check-input toggle-paid" type="checkbox" data-id="' . $row->id . '" ' . $checked . '>
                    
                </div>';
                    })
                    ->editColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('d M Y h:i A');
                    })
                    ->editColumn('user_status', function ($data) {
                        if ($data->user_status == 1) {
                            // Green badge for active
                            return '<span class="badge bg-success">Active</span>';
                        } else {
                            // Red badge for blocked
                            return '<span class="badge bg-danger">Blocked</span>';
                        }
                    })


                    ->addColumn('action', function ($row) {
                        $buttons = '';

                        if ($row->user_status == '1') {
                            // $buttons .= '<button type="button" class="btn-one btn-success btn-sm update-status" data-id="' . $row->id . '" data-update-status="approved">Approve</button>';
                            $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $row->id . '" data-update-status="0">Block</button>';
                        } elseif ($row->user_status == '0') {
                            $buttons .= '<button type="button" class="btn-one btn-danger btn-sm update-status" data-id="' . $row->id . '" data-update-status="1">Unblock</button>';
                        }



                        $viewBtn = '<a href="' . route('admin.user.Detail', $row->id) . '" class="btn-one btn-info mb-2">View</a>';
                        $manageCommentsBtn = '<a href="' . route('admin.manage.comments', $row->id) . '" class="btn-one btn-secondary mb-2">Manage Comments</a>';



                        return $viewBtn . ' ' . $buttons . ' ' . $manageCommentsBtn;
                    })


                   ->rawColumns(['user_status', 'paid_status', 'action'])
                    ->make(true);
            }

            return view('admin.approved-user-list');
        } catch (Exception $e) {
            Log::error('User List Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong'], 500);
        }
    }

    public function blockUserStatus(Request $request, $id)
    {
        try {

            $user = $this->UserRepository->findByWhere(['id' => $id]);
            // dd($user);
            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found'], 404);
            }

            $data = $request->except('_token');
            $this->UserRepository->update($id, $data);
            return response()->json(['status' => true, 'message' => 'User status updated successfully'], 200);
        } catch (Exception $e) {
            Log::error('Block User Error: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => __('message.some_thing_went_wrong')], 500);
        }
    }

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

    public function manageComments($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['status' => false, 'message' => 'User not found'], 404);
            }
            return view('admin.manage-comments', compact('user'));
        } catch (Exception $e) {
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

    public function getCommentsData(Request $request)
    {
        try {
            $previousUrl = url()->previous();
            $id = basename($previousUrl);

            if ($request->ajax()) {
                // Ensure the 'user' relationship is loaded
                $comments = Comment::with('user')->where('user_id', $id)->orderBy('id', 'desc');

                return DataTables::of($comments)
                    ->addIndexColumn()
                    ->addColumn('user', function ($row) {
                        // Access the 'username' from the related 'user' model
                        return $row->user->username ?? 'N/A';
                    })
                    ->addColumn('action', function ($row) {
                        $editBtn = '<button class="btn-one btn-info btn-sm edit-comment" data-id="' . $row->id . '" data-comment="' . $row->comment . '" data-rating="' . $row->rating . '" data-status="' . $row->is_approved . '">Edit</button>';
                        $deleteBtn = '<button class="btn-one btn-danger btn-sm delete-comment" data-id="' . $row->id . '">Delete</button>';
                        return $editBtn . ' ' . $deleteBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        } catch (Exception $e) {
            Log::error('Error fetching comments: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong'], 500);
        }
    }

    public function storeComment(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'required|boolean',
        ]);

        try {
            Comment::create($request->all());
            return response()->json(['status' => 1, 'message' => 'Comment added successfully']);
        } catch (Exception $e) {
            Log::error('Error adding comment: ' . $e->getMessage());
            return response()->json(['status' => 0, 'message' => 'Failed to add comment'], 500);
        }
    }

    public function updateComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'is_approved' => 'required|boolean',
        ]);

        try {
            $comment = Comment::findOrFail($request->comment_id);
            $comment->update($request->only(['comment', 'rating', 'is_approved']));
            return response()->json(['status' => 1, 'message' => 'Comment updated successfully']);
        } catch (Exception $e) {
            Log::error('Error updating comment: ' . $e->getMessage());
            return response()->json(['status' => 0, 'message' => 'Failed to update comment'], 500);
        }
    }

    public function deleteComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
        ]);

        try {
            $comment = Comment::findOrFail($request->comment_id);
            $comment->delete();
            return response()->json(['status' => 1, 'message' => 'Comment deleted successfully']);
        } catch (Exception $e) {
            Log::error('Error deleting comment: ' . $e->getMessage());
            return response()->json(['status' => 0, 'message' => 'Failed to delete comment'], 500);
        }
    }

}