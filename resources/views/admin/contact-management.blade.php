@extends('admin.layouts.master')

@section('title', 'Contact Us Messages')

@section('content')
<style>
    .swal2-container {
        z-index: 99999 !important;
    }

    .message-cell {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">
        {{-- contact messages table --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="contactTable" class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Organization</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- View Message Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Name:</strong>
                        <p id="view-name" class="text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p id="view-email" class="text-muted"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Phone No:</strong>
                        <p id="view-phone" class="text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Date:</strong>
                        <p id="view-date" class="text-muted"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Organization:</strong>
                        <p id="view-organization" class="text-muted"></p>
                    </div>
                    <div class="col-12">
                        <strong>Message:</strong>
                        <p id="view-message" class="text-muted"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        const table = $('#contactTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: "{{ route('admin.contact.management') }}",

            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],

            order: [
                [5, 'desc']
            ],

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'organization',
                    name: 'organization'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],

            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    responsivePriority: 3,
                    targets: -1
                }
            ]
        });

        // View Message modal fill
        $(document).on('click', '.view-message', function() {
            $('#view-name').text($(this).data('name'));
            $('#view-email').text($(this).data('email'));
            $('#view-country_code').text($(this).data('country_code'));
            $('#view-phone').text($(this).data('phone'));
            $('#view-organization').text($(this).data('organization'));
            $('#view-message').text($(this).data('message'));
            $('#view-date').text($(this).data('date'));
            $('#viewMessageModal').modal('show');
        });

    });
</script>

@endsection