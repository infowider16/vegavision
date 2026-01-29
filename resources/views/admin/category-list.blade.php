@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')

    <style>
        div#categoryTable_filter {
            margin-bottom: 20px;
        }

        .swal2-container {
            z-index: 99999 !important;
        }
    </style>

    <section class="nftmax-adashboard nftmax-show">
        <div class="nftmax-adashboard-left">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-one mx-0 add-category-btn" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">
                            <i class="fas fa-plus me-2"></i> Add Category
                        </button>
                    </div>
                </div>
            </div>

            {{-- Category Table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="categoryTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($categories as $item)
                                    <tr id="category-row-{{ $item->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <button class="btn-one btn-sm btn-warning edit-category"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <button class="btn-one btn-sm btn-danger delete-category"
                                                data-id="{{ $item->id }}">
                                                <i class="fas fa-trash"></i> Delete
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="categoryName"
                                placeholder="Enter category name">
                            <div class="invalid-feedback" id="categoryError"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="addCategoryBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                Add Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        @csrf
                        <input type="hidden" name="category_id" id="editCategoryId">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="editCategoryName"
                                placeholder="Enter category name">
                            <div class="invalid-feedback" id="editCategoryNameError"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="editCategoryBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();

            // Add Category
            $("#addCategoryForm").submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let submitBtn = $("#addCategoryBtn");
                let spinner = submitBtn.find(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: "{{ route('admin.addcategory') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (response.status == 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Category Added",
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false,
                            });
                            $("#addCategoryModal").modal("hide");
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Add Failed",
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                let input = $(`[name="${field}"]`);
                                input.addClass("is-invalid");
                                input.closest(".mb-3").find(".invalid-feedback").text(messages[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Server Error",
                                text: "Something went wrong. Please try again later.",
                            });
                        }
                    },
                });
            });

            // Edit Category
            $(document).on('click', '.edit-category', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');

                $('#editCategoryId').val(id);
                $('#editCategoryName').val(name);
                $('#editCategoryModal').modal('show');
            });

            $("#editCategoryForm").submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let submitBtn = $("#editCategoryBtn");
                let spinner = submitBtn.find(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: "{{ route('admin.updatecategory') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (response.status == 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Category Updated",
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false,
                            });
                            $("#editCategoryModal").modal("hide");
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Update Failed",
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                let input = $(`[name="${field}"]`);
                                input.addClass("is-invalid");
                                input.closest(".mb-3").find(".invalid-feedback").text(messages[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Server Error",
                                text: "Something went wrong. Please try again later.",
                            });
                        }
                    },
                });
            });

            // Delete Category
            $(document).on('click', '.delete-category', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This category will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.deletecategory') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                category_id: id
                            },
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted',
                                        text: response.message,
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                    $('#category-row-' + id).remove();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Delete Failed',
                                        text: response.message,
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Server Error',
                                    text: 'Something went wrong. Please try again later.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
