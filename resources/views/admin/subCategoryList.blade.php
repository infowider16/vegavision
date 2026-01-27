@extends('admin.layouts.master')

@section('title', 'Sub-Category List')

@section('content')
<style>
    .swal2-container {
    z-index: 99999 !important;
}

</style>
    <section class="nftmax-adashboard nftmax-show">
        <div class="nftmax-adashboard-left">
            <div class="row mb-4">
                <div class="col-12">
                    <button type="button" class="btn-one" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="fas fa-plus me-2"></i> Add Sub-Category
                    </button>
                </div>
            </div>

            {{-- category table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="categoryTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col" width="25%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($subCategories as $item)
                                    <tr id="category-row-{{ $item->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>
                                            <button class="btn-one btn-success edit-category" 
                                                    data-id="{{ $item->id }}" 
                                                    data-name="{{ $item->name }}"
                                                    data-parent-id="{{ $item->category_id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn-one btn-danger delete-category" 
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
                    <h5 class="modal-title">Add Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm">
                        @csrf
                        <div class="mb-3">
                            <label for="parentCategory" class="form-label">Parent Category</label>
                            <select name="parent_category" id="parentCategory" class="form-control" required>
                                {{-- <option value="">Select Parent Category</option> --}}
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="parentCategoryError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Sub-Category Name</label>
                            <input type="text" name="category" class="form-control" required id="categoryName" placeholder="Enter sub-category name">
                            <div class="invalid-feedback" id="categoryError"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-one" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="addCategoryBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Add Sub-Category
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
                    <h5 class="modal-title">Edit Sub-Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        @csrf
                        <input type="hidden" name="category_id" id="editCategoryId">
                        <div class="mb-3">
                            <label for="editParentCategory" class="form-label">Parent Category</label>
                            <select name="parent_category" id="editParentCategory" class="form-control" required>
                                {{-- <option value="">Select Parent Category</option> --}}
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="editParentCategoryError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Sub-Category Name</label>
                            <input type="text" name="category" class="form-control" required id="editCategoryName" placeholder="Enter sub-category name">
                            <div class="invalid-feedback" id="editCategoryError"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-one" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="editCategoryBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Update Sub-Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function() {
    $('#categoryTable').DataTable();

    function showSuccess(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: message,
            confirmButtonColor: '#3085d6'
        });
    }

    function showError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message,
            confirmButtonColor: '#d33'
        });
    }

    function showConfirm(title, text, confirmBtn, callback) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: confirmBtn
        }).then((result) => {
            if (result.isConfirmed) callback();
        });
    }

    // Add Sub-Category
    $("#addCategoryForm").submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let submitBtn = form.find('#addCategoryBtn');
        let spinner = submitBtn.find('.spinner-border');
        let categoryInput = form.find('#categoryName');
        let parentSelect = form.find('#parentCategory');
        let categoryError = form.find('#categoryError');
        let parentError = form.find('#parentCategoryError');

        // Reset validation
        categoryInput.removeClass('is-invalid');
        parentSelect.removeClass('is-invalid');
        categoryError.text('');
        parentError.text('');

        // Show loading
        submitBtn.prop('disabled', true);
        spinner.removeClass('d-none');

        $.ajax({
            url: '{{ route("admin.subaddcategory") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');

                if (response.status == 1) {
                    showSuccess(response.message);
                    $('#addCategoryModal').modal('hide');
                    form[0].reset();
                    location.reload();
                } else {
                    if (response.errors) {
                        showError('Please fix the highlighted errors.');
                        if (response.errors.category) {
                            categoryInput.addClass('is-invalid');
                            categoryError.text(response.errors.category[0]);
                        }
                        if (response.errors.parent_category) {
                            parentSelect.addClass('is-invalid');
                            parentError.text(response.errors.parent_category[0]);
                        }
                    } else {
                        showError(response.message || 'Something went wrong.');
                    }
                }
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    showError('Please fix the highlighted errors.');
                    if (errors.category) {
                        categoryInput.addClass('is-invalid');
                        categoryError.text(errors.category[0]);
                    }
                    if (errors.parent_category) {
                        parentSelect.addClass('is-invalid');
                        parentError.text(errors.parent_category[0]);
                    }
                } else {
                    showError('Something went wrong. Please try again.');
                }
            }
        });
    });

    // Edit Sub-Category - Open Modal
    $(document).on('click', '.edit-category', function() {
        $('#editCategoryId').val($(this).data('id'));
        $('#editCategoryName').val($(this).data('name'));
        $('#editParentCategory').val($(this).data('parent-id'));
        $('#editCategoryModal').modal('show');
    });

    // Edit Sub-Category - Submit
    $("#editCategoryForm").submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let submitBtn = form.find('#editCategoryBtn');
        let spinner = submitBtn.find('.spinner-border');
        let categoryInput = form.find('#editCategoryName');
        let parentSelect = form.find('#editParentCategory');
        let categoryError = form.find('#editCategoryError');
        let parentError = form.find('#editParentCategoryError');

        // Reset validation
        categoryInput.removeClass('is-invalid');
        parentSelect.removeClass('is-invalid');
        categoryError.text('');
        parentError.text('');

        // Show loading
        submitBtn.prop('disabled', true);
        spinner.removeClass('d-none');

        $.ajax({
            url: '{{ route("admin.updatesubcategory") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');

                if (response.status == 1) {
                    showSuccess(response.message);
                    $('#editCategoryModal').modal('hide');
                    location.reload();
                } else {
                    if (response.errors) {
                        showError('Please fix the highlighted errors.');
                        if (response.errors.category) {
                            categoryInput.addClass('is-invalid');
                            categoryError.text(response.errors.category[0]);
                        }
                        if (response.errors.parent_category) {
                            parentSelect.addClass('is-invalid');
                            parentError.text(response.errors.parent_category[0]);
                        }
                    } else {
                        showError(response.message || 'Something went wrong.');
                    }
                }
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    showError('Please fix the highlighted errors.');
                    if (errors.category) {
                        categoryInput.addClass('is-invalid');
                        categoryError.text(errors.category[0]);
                    }
                    if (errors.parent_category) {
                        parentSelect.addClass('is-invalid');
                        parentError.text(errors.parent_category[0]);
                    }
                } else {
                    showError('Something went wrong. Please try again.');
                }
            }
        });
    });

    // Delete Sub-Category
    $(document).on('click', '.delete-category', function() {
        let categoryId = $(this).data('id');
        let button = $(this);

        showConfirm('Are you sure?', "You won't be able to revert this!", 'Yes, delete it!', function() {
            button.html('<i class="fas fa-spinner fa-spin"></i> Deleting...');
            $.ajax({
                url: '{{ route("admin.deletesubcategory") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: categoryId
                },
                success: function(response) {
                    if (response.status == 1) {
                        showSuccess(response.message);
                        $('#category-row-' + categoryId).remove();
                    } else {
                        showError(response.message);
                    }
                    button.html('<i class="fas fa-trash"></i> Delete');
                },
                error: function() {
                    showError('Something went wrong.');
                    button.html('<i class="fas fa-trash"></i> Delete');
                }
            });
        });
    });
});
</script>
@endsection