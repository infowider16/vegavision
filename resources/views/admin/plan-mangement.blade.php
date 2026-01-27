@extends('admin.layouts.master')

@section('title', 'Paid Ads Settings')

@section('content')


<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">


        <div class="row tabel-main-box tabel-main-box-o ">
            <div class="col-lg-12 col-padding-0 d-none">
                <div class="tabel-search-box">
                    <div class="tabel-search-box-item">

                        <div class="tabel-search-box-button">
                            <div class="tabel-search-box-button-img">

                            </div>
                            <div class="dropdown">
                                <a class="btn-one btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#addPlanModal">
                                    Add Plan
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-12">
                <div class="tabel-main tabel-main-three ">
                    <table id="expendable-data-table" class="table display nowrap">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>
                                    Title
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    Plan Duration
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    Amount
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </th>
                                

                                <th>
                                    Action
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.332 2.31567V14.3157" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66602 12.3157L4.66602 14.3157L2.66602 12.3157"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66602 14.3157V2.31567" stroke="#718096"
                                                stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.332 4.31567L11.332 2.31567L9.33203 4.31567"
                                                stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </th>


                            </tr>
                        </thead>

                        <tbody>
                             @foreach($plans as $key => $plan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $plan->title }}</td>
                                <td>{{ $plan->plan_duration }} Days</td>
                                <td>${{ number_format($plan->price, 2) }}</td>
                                <td class="d-flex">
                                    <button class=" btn-one btn-primary editPlanBtn"
                                        data-id="{{ $plan->id }}"
                                        data-title="{{ $plan->title }}"
                                        data-sub_title="{{ $plan->sub_title }}"
                                        data-description="{{ $plan->description }}"
                                       
                                        data-plan_duration="{{ $plan->plan_duration }}"
                                        data-price="{{ $plan->price }}"
                                        >
                                        Edit
                                    </button>


                                    <button class="btn-one btn-danger deletePlanBtn" data-id="{{ $plan->id }}">
                                        Delete
                                    </button>
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
<!-- Add Plan Modal -->
<!-- Add Plan Modal -->
<div class="modal fade" id="addPlanModal" tabindex="-1" aria-labelledby="addPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addPlanForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-3">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="sub_title">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                    </div>

                  

                    <div class="mb-3">
                        <label>Plan Duration (Days)</label>
                        <input type="number" class="form-control" name="plan_duration">
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" step="0.01">
                    </div>

               

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn-one">Save Plan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editPlanModal" tabindex="-1" aria-labelledby="editPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editPlanForm">
            @csrf
            <input type="hidden" name="id" id="editPlanId">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="editTitle">
                    </div>

                    <div class="mb-3">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="sub_title" id="editSubTitle">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="editDescription" rows="4"></textarea>
                    </div>

                 

                    <div class="mb-3">
                        <label>Plan Duration (Days)</label>
                        <input type="number" class="form-control" name="plan_duration" id="editDuration">
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" id="editPrice" step="0.01">
                    </div>

                 

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn-one">Update Plan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- End NFTmax Dashboard -->
@endsection

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@section('scripts')
<script>
    $(document).ready(function() {
        
        $('#expendable-data-table').DataTable();
    });

    $(document).on('submit', '#addPlanForm', function(e) {
        e.preventDefault();

        let form = $(this);
        let submitBtn = form.find('button[type="submit"]');
        let formData = form.serialize();

        // Clear previous errors
        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.text-danger').remove();

        $.ajax({
            url: "{{ route('admin.plans.store') }}",
            method: "POST",
            data: formData,
            beforeSend: function() {
                submitBtn.prop('disabled', true).text('Saving...');
            },
            success: function(res) {
                submitBtn.prop('disabled', false).text('Save Plan');

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: res.message || 'Plan added successfully.',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    location.reload(); // 🔄 Reloads the page
                });
                $('#addPlanModal').modal('hide');
                form[0].reset();

                // Optionally refresh plan list
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).text('Save Plan');

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    for (let key in errors) {
                        let field = form.find(`[name="${key}"]`);
                        field.addClass('is-invalid');
                        field.after(`<div class="text-danger">${errors[key][0]}</div>`);
                    }

                    // Optionally scroll to first error
                    let firstErrorField = form.find('.is-invalid').first();
                    if (firstErrorField.length) {
                        $('html, body').animate({
                            scrollTop: firstErrorField.offset().top - 100
                        }, 300);
                    }
                } else {
                    // Only show popup for non-validation errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Something went wrong!',
                        confirmButtonColor: '#d33'
                    });
                }
            }
        });
    });
    $(document).on('click', '.editPlanBtn', function() {
        $('#editPlanId').val($(this).data('id'));
        $('#editTitle').val($(this).data('title'));
        $('#editSubTitle').val($(this).data('sub_title'));
        $('#editDescription').val($(this).data('description'));
        $('#editIsPaid').val($(this).data('is_paid'));
        $('#editDuration').val($(this).data('plan_duration'));
        $('#editPrice').val($(this).data('price'));
        $('#editListingCount').val($(this).data('no_of_listing'));

        // Handle checkbox for unlimited listings
        if ($(this).data('is_unlimited') == 1) {
            $('#editIsUnlimited').prop('checked', true);
        } else {
            $('#editIsUnlimited').prop('checked', false);
        }

        $('#editPlanModal').modal('show');
    });

    $('#editPlanForm').submit(function(e) {
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize();
        let submitBtn = form.find('button[type="submit"]');

        $.ajax({
            url: "{{ route('admin.plans.update') }}", // Create this route
            method: "POST",
            data: formData,
            beforeSend: function() {
                submitBtn.prop('disabled', true).text('Updating...');
            },
            success: function(res) {
                submitBtn.prop('disabled', false).text('Update Plan');
                $('#editPlanModal').modal('hide');
                form[0].reset();

                Swal.fire('Updated!', res.message || 'Plan updated.', 'success');
                setTimeout(() => location.reload(), 1000);
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).text('Update Plan');
                if (xhr.status === 422) {
                    $.each(xhr.responseJSON.errors, function(key, val) {
                        form.find(`[name="${key}"]`).addClass('is-invalid')
                            .after(`<div class="text-danger">${val[0]}</div>`);
                    });
                } else {
                    Swal.fire('Error!', xhr.responseJSON.message || 'Something went wrong.', 'error');
                }
            }
        });
    });
    $(document).on('click', '.deletePlanBtn', function() {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the plan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/plans/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        Swal.fire('Deleted!', res.message || 'Plan deleted.', 'success');
                        setTimeout(() => location.reload(), 800);
                    },
                    error: function() {
                        Swal.fire('Error!', 'Failed to delete plan.', 'error');
                    }
                });
            }
        });
    });
</script>
@endsection