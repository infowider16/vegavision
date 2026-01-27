<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PlanServices;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Requests\Admin\PlanRequest;
use App\Repositories\PlanRepository;
use App\Repositories\TransactionRepository;

class PlanController extends Controller
{
    protected $planservices;
    protected $planRepository;
    protected $transactionRepository;
    public function __construct(PlanServices $planservices, PlanRepository $planRepository, TransactionRepository $transactionRepository)
    {
        $this->planservices = $planservices;
        $this->planRepository = $planRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        try{
            $perPage = 10;
        $plans =  $this->planRepository->paginatePlans($perPage);

        // dd($plans);
    
            return view('admin.plan-mangement', compact('plans'));
        }catch (Exception $e) {
            Log::error("PlanController : index()" . $e->getLine() . " " . $e->getMessage());
            return response()->json(['message' => 'Something went wrong', 'status' => 0, 'data' => [], 'error' => $e->getMessage()], 500);
        }
    }

        public function store(PlanRequest $request): JsonResponse
    {
        try {
            // dd($request->all());
            $validated = $request->validated();
            if (!isset($validated['is_unlimited'])) {
                $validated['is_unlimited'] = 0;
            }
            $plan = $this->planRepository->create($request->validated());
            return response()->json([
                'message' =>  __('Plan craeted successfully', ['parameter' => 'Plan']),
                'data' => $plan
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creating plan: ' . $e->getMessage());

            return response()->json([
                'message' => 'Something went wrong while creating the plan.',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

        public function destroy($id): JsonResponse
    {
        $deleted = $this->planRepository->deletePlan($id);
        return response()->json([
            'message' => $deleted ? 'Plan deleted successfully.' : 'Failed to delete plan.'
        ], $deleted ? 200 : 500);
    }

        public function update(PlanRequest $request): JsonResponse
    {

        $updated =$this->planRepository->updatePlan($request->id, $request->validated());
        $message = $updated
            ? __('Update successfully', ['parameter' => 'Plan'])
            : __('Update failed', ['parameter' => 'Plan']);

        return response()->json([
            'message' => $message
        ], $updated ? 200 : 500);
    }

    public function planPurchaseHistory(){
        try{
            $transactions = $this->transactionRepository->getTransactions();
            // dd($transactions);
            return view('admin.plan-purchase-history', compact('transactions'));
        }catch (\Exception $e){
            Log::error("PlanController : planPurchaseHistory()" . $e->getLine() . " " . $e->getMessage());
            return response()->json(['message' => 'Something went wrong', 'status' => 0, 'data' => [], 'error' => $e->getMessage()], 500);
        }
    }
}
