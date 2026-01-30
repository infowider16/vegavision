@extends('admin.layouts.master')

@section('title', 'Blog List')

@section('content')

    <style>
        div#blogTable_filter {
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
                        <a href="{{ route('admin.blogs.create') }}" class="btn-one mx-0">
                            <i class="fas fa-plus me-2"></i> Add Blog
                        </a>
                    </div>
                </div>
            </div>

            {{-- Blog Table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="blogTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($blogs as $blog)
                                    <tr id="blog-row-{{ $blog->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ isset($blog) && $blog->cover_image ? asset('storage/'.$blog->cover_image) : '' }}" style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.blogs.view', $blog->id) }}" class="btn-one btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn-one btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button class="btn-one btn-sm btn-danger delete-blog"
                                                data-id="{{ $blog->id }}">
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

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#blogTable').DataTable();

            // Delete Blog
            $(document).on('click', '.delete-blog', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This blog will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                         $.ajax({
                            url: "{{ route('admin.blogs.delete') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
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
                                    $('#blog-row-' + id).remove();
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
