@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')


<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">


        <div class="row tabel-main-box tabel-main-box-o ">
            <div class="col-lg-12 col-padding-0">
                <div class="tabel-search-box">
                    <div class="tabel-search-box-item">

                        <div class="tabel-search-box-button">
                            <div class="tabel-search-box-button-img">

                            </div>

                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-12">
                <div class="tabel-main tabel-main-three ">
                    <table id="user-data-table" class="table display nowrap">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>
                                    Name

                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone No.
                                </th>
                                <th>Ip Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>


</section>
<!-- Rejection Reason Modal -->
<div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rejection Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="reasonText">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
</div>


<!-- End NFTmax Dashboard -->
@endsection
@section('scripts')
<script>
   

    $(document).on('click', '.read-reason', function() {
        const reason = $(this).data('reason');
        $('#reasonText').text(reason);
        $('#reasonModal').modal('show');
    });
    $(document).on('click', '.read-more-toggle', function() {
        const $btn = $(this);
        const $row = $btn.closest('td');
        $row.find('.short-msg, .full-msg').toggleClass('d-none');
        $btn.text($btn.text() === 'Read more' ? 'Read less' : 'Read more');
    });
    $('#user-data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.user-list') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'username',
                name: 'username'
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
                data: 'ip_address',
                name: 'ip_address'
            },
            {
                data: 'status',
                name: 'status',
                orderable: false,
                searchable: false
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
            },
        ]
    });

    $(document).on('click', '.update-status', function() {
        var id = $(this).data('id');
        var $btn = $(this);
        var update_status = $(this).data('update-status');

        //change btn text and disable it
        // 🔄 Store original text to revert later if needed
        var originalText = $btn.text();

        // 🔄 Set button to loading state


        if (update_status == 'rejected') {
            // Show SweetAlert to get rejection reason
            Swal.fire({
                title: 'Reason for Rejection',
                input: 'text',
                inputPlaceholder: 'Enter reason here...',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Rejection reason is required.');
                        return false;
                    }

                    $btn.prop('disabled', true).text('Updating...');


                    // AJAX call with reason
                    return $.ajax({
                        url: `/admin/update-user-status/${id}`,
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: update_status,
                            reject_reason: reason
                        },
                        success: function(res) {
                            if (res.status === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: res.message || 'Status updated successfully.',
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    $('#user-data-table').DataTable().ajax.reload();
                                });
                            } else {
                                Swal.fire('Error!', res.message || 'Failed to update status.', 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Failed to update status.', 'error');
                        }
                    }).then((res) => {
                        return res; // This will be available in result.value
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed && result.value && result.value.status === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Rejected',
                        text: result.value.message || 'Status updated successfully.',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        $('#user-data-table').DataTable().ajax.reload();
                    });
                } else {
                    Swal.fire('Error!', 'Something went wrong while rejecting.', 'error');
                }
            });

        } else {
            // For all other statuses (e.g. Approved)
            $btn.prop('disabled', true).text('Updating...');

            $.ajax({
                url: `/admin/update-user-status/${id}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: update_status
                },
                success: function(res) {
                    if (res.status === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message || 'Status updated successfully.',
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            $('#user-data-table').DataTable().ajax.reload();
                        });
                    } else {
                        Swal.fire('Error!', res.message || 'Failed to update status.', 'error');
                        $btn.prop('disabled', false).text('Update');

                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Failed to update status.', 'error');
                    $btn.prop('disabled', false).text('Update');

                }
            });
        }
    });
</script>
@endsection