@extends('admin.layouts.master')

@section('title', 'Plan Purchase History')

@section('content')
<style>
    .avatar-placeholder {
        background-color: #f0f0f0;
        color: #999;
    }
    
    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .bg-success {
        background-color: #28a745 !important;
    }
    
    .bg-warning {
        background-color: #ffc107 !important;
        color: #212529 !important;
    }
    
    .bg-danger {
        background-color: #dc3545 !important;
    }
    
    #transaction-history-table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">
        <div class="row tabel-main-box tabel-main-box-o">
            <div class="col-lg-12 col-padding-0">
                <div class="tabel-search-box">
                    <div class="tabel-search-box-item">
                        <div class="tabel-search-box-button">
                            <div class="tabel-search-box-button-img"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="tabel-main tabel-main-three">
                    <table id="transaction-history-table" class="table display nowrap">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>User</th>
                                <th>Plan</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $key => $transaction)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($transaction->user->profile_image)
                                        <img src="{{ asset('storage/' . $transaction->user->profile_image) }}" 
                                             class="rounded-circle me-2" 
                                             width="40" 
                                             height="40" 
                                             alt="User Image">
                                        @else
                                        <div class="avatar-placeholder rounded-circle me-2" 
                                             style="width: 40px; height: 40px; background: #eee; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <div class="fw-bold">{{ $transaction->user->username }}</div>
                                            <small class="text-muted">{{ $transaction->user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $transaction->user->plan_name }}</td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>
                                    <span class="badge 
                                        @if($transaction->status == 'paid') bg-success 
                                        @elseif($transaction->status == 'pending') bg-warning 
                                        @else bg-danger 
                                        @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $transaction->created_at->format('M d, Y h:i A') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


{{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

@section('scripts')
<script>
     $(document).ready(function() {
        
        $('#transaction-history-table').DataTable();
    });
</script>
@endsection