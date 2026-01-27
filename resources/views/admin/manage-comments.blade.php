@extends('admin.layouts.master')

@section('title', 'Manage Comments')

@section('content')

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        div#commentsTable_filter {
            margin-bottom: 20px;
        }

        .swal2-container {
            z-index: 99999 !important;
        }

        .nowrap {
            white-space: nowrap;
        }
    </style>

    <section class="nftmax-adashboard nftmax-show">
        <div class="nftmax-adashboard-left">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-one mx-0 add-comment-btn" data-bs-toggle="modal"
                            data-bs-target="#addCommentModal">
                            <i class="fas fa-plus me-2"></i> Add Comment
                        </button>
                    </div>
                </div>
            </div>

            {{-- comments table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="commentsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Comment Modal -->
    <div class="modal fade" id="addCommentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCommentForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" class="form-control" id="comment" rows="4" 
                                placeholder="Enter your comment" required></textarea>
                            <div class="invalid-feedback" id="commentError"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select name="rating" id="rating" class="form-select" required>
                                <option value="">Select Rating</option>
                                <option value="1">⭐ 1 Star</option>
                                <option value="2">⭐⭐ 2 Stars</option>
                                <option value="3">⭐⭐⭐ 3 Stars</option>
                                <option value="4">⭐⭐⭐⭐ 4 Stars</option>
                                <option value="5">⭐⭐⭐⭐⭐ 5 Stars</option>
                            </select>
                            <div class="invalid-feedback" id="ratingError"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="is_approved" id="status" class="form-select" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div class="invalid-feedback" id="statusError"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="addCommentBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                Add Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Comment Modal -->
    <div class="modal fade" id="editCommentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCommentForm">
                        @csrf
                        <input type="hidden" name="comment_id" id="editCommentId">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        
                        <div class="mb-3">
                            <label for="editComment" class="form-label">Comment</label>
                            <textarea name="comment" class="form-control" id="editComment" rows="4" 
                                placeholder="Enter your comment" required></textarea>
                            <div class="invalid-feedback" id="editCommentError"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editRating" class="form-label">Rating</label>
                            <select name="rating" id="editRating" class="form-select" required>
                                <option value="">Select Rating</option>
                                <option value="1">⭐ 1 Star</option>
                                <option value="2">⭐⭐ 2 Stars</option>
                                <option value="3">⭐⭐⭐ 3 Stars</option>
                                <option value="4">⭐⭐⭐⭐ 4 Stars</option>
                                <option value="5">⭐⭐⭐⭐⭐ 5 Stars</option>
                            </select>
                            <div class="invalid-feedback" id="editRatingError"></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Status</label>
                            <select name="is_approved" id="editStatus" class="form-select" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div class="invalid-feedback" id="editStatusError"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one" id="editCommentBtn">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                Update Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            
            // Initialize DataTable
            $('#commentsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.comments.data') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'user', name: 'user'}, // Ensure this matches the 'user' column from the controller
                    {data: 'comment', name: 'comment'},
                    {
                        data: 'rating',
                        name: 'rating',
                        render: function(data) {
                            return '⭐'.repeat(data) + ' (' + data + ')';
                        }
                    },
                    {
                        data: 'is_approved',
                        name: 'is_approved',
                        render: function(data) {
                            return data ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Add Comment
            $("#addCommentForm").submit(function(e) {
                e.preventDefault();

                let form = $(this)[0];
                let formData = new FormData(form);

                let submitBtn = $("#addCommentBtn");
                let spinner = submitBtn.find(".spinner-border");

                // Reset validation errors
                $(".form-control, .form-select").removeClass("is-invalid");
                $(".invalid-feedback").text("");

                // Loading state
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: '{{ route("admin.comments.store") }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (response.status == 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Comment Added",
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false,
                            });

                            $("#addCommentModal").modal("hide");
                            form.reset();
                            $('#commentsTable').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Add Failed",
                                text: response.message || "Unable to add comment. Please try again.",
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            Swal.fire({
                                icon: "error",
                                title: "Validation Error",
                                text: "Please correct the highlighted fields.",
                            });

                            $.each(errors, function(field, messages) {
                                let input = $(`[name="${field}"]`);
                                input.addClass("is-invalid");
                                let errorDiv = input.closest(".mb-3").find(".invalid-feedback");
                                errorDiv.text(messages[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Server Error",
                                text: "Something went wrong. Please try again later.",
                            });
                        }
                    }
                });
            });

            // Edit Comment - Open Modal
            $(document).on('click', '.edit-comment', function() {
                let commentId = $(this).data('id');
                let comment = $(this).data('comment');
                let rating = $(this).data('rating');
                let status = $(this).data('status');

                $('#editCommentId').val(commentId);
                $('#editComment').val(comment);
                $('#editRating').val(rating);
                $('#editStatus').val(status);
                $('#editCommentModal').modal('show');
            });

            // Edit Comment - Submit
            $("#editCommentForm").submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = new FormData(this);

                let submitBtn = $("#editCommentBtn");
                let spinner = submitBtn.find(".spinner-border");

                // Reset validation states
                $("#editCommentForm .form-control, #editCommentForm .form-select").removeClass("is-invalid");
                $("#editCommentForm .invalid-feedback").text("");

                // Show loading
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: "{{ route('admin.comments.update') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (response.status == 1) {
                            Swal.fire({
                                icon: "success",
                                title: "Comment Updated",
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false,
                            });

                            $("#editCommentModal").modal("hide");
                            $('#commentsTable').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Update Failed",
                                text: response.message || "Unable to update comment.",
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            Swal.fire({
                                icon: "error",
                                title: "Validation Error",
                                text: "Please fix the highlighted fields.",
                            });

                            $.each(errors, function(key, messages) {
                                let input = form.find('[name="' + key + '"]');
                                if (input.length > 0) {
                                    input.addClass("is-invalid");
                                    input.closest(".mb-3").find(".invalid-feedback").text(messages[0]);
                                }
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

            // Delete Comment
            $(document).on('click', '.delete-comment', function() {
                let commentId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This comment will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("admin.comments.delete") }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                comment_id: commentId
                            },
                            beforeSend: function() {
                                $('.delete-comment[data-id="' + commentId + '"]').html(
                                    '<i class="fas fa-spinner fa-spin"></i> Deleting...'
                                );
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
                                    $('#commentsTable').DataTable().ajax.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Delete Failed',
                                        text: response.message || 'Unable to delete comment.',
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Server Error',
                                    text: 'Something went wrong. Please try again later.',
                                });
                            },
                            complete: function() {
                                $('.delete-comment[data-id="' + commentId + '"]').html(
                                    '<i class="fas fa-trash"></i> Delete'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
