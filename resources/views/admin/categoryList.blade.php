@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        div#categoryTable_filter {
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
                        <button type="button" class="btn-one  mx-0 add-category-btn" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">
                            <i class="fas fa-plus me-2"></i> Add Category
                        </button>
                    </div>
                </div>
            </div>

            {{-- category table --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="categoryTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Category</th>
                                   {{-- <th scope="col">Regions</th> --}}
                                    {{-- <th scope="col">Provinces</th> --}}
                                    {{--<th scope="col">Municipalities</th> --}}
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($categories as $item)
                                    <tr id="category-row-{{ $item->id }}">
                                        <td>{{ $i++ }}</td>

                                        {{-- Image --}}
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="Category Image"
                                                    width="60" height="60" class="rounded">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        {{-- Category --}}
                                        <td>{{ $item->category_name }}</td>

                                        {{-- Regions --}}
                                       {{-- <td>
                                            @if ($item->regions_relation()->count())
                                                {{ implode(', ', $item->regions_relation()->toArray()) }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td> --}}

                                        {{-- Provinces --}}
                                        {{-- <td>
                                            @if ($item->provinces_relation()->count())
                                                {{ implode(', ', $item->provinces_relation()->toArray()) }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td> --}}

                                        {{-- Municipalities --}}
                                       {{--<td>
                                            @if ($item->municipalities_relation()->count())
                                                {{ implode(', ', $item->municipalities_relation()->toArray()) }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td> --}}

                                        {{-- Actions --}}
                                        <td>
                                            <button class="btn-one btn-sm btn-warning edit-category "
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->category_name }}"
                                                data-image="{{ $item->image ? asset('storage/'.$item->image) : '' }}"
                                                data-description="{{ $item->description }}"
                                               {{-- data-regions="{{ implode(', ', $item->regions_relation()->toArray()) }}" --}}
                                                {{-- data-provinces="{{ implode(', ', $item->provinces_relation()->toArray()) }}" --}}
                                                {{-- data-municipalities="{{ implode(', ', $item->municipalities_relation()->toArray()) }}"> --}}
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <button class="btn-one btn-sm btn-danger delete-category "
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
                    <form id="addCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="category" class="form-control" id="categoryName"
                                placeholder="Enter category name">
                            <div class="invalid-feedback" id="categoryError"></div>
                        </div>
                       {{-- <div class="mb-3">
                            <label for="region" class="form-label">Regions</label>
                            <select name="regions[]" id="region" class="form-select select2" multiple="multiple"
                                data-placeholder="Select Regions">
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div> --}}

                        <div class="mb-3 d-none">
                            <label for="provinces" class="form-label">Provinces</label>
                            <select name="provinces[]" id="provinces" class="form-select select2" multiple>
                                <option value="">Select Provinces</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                      {{--  <div class="mb-3">
                            <label for="municipality" class="form-label">Municipalities</label>
                            <select name="municipality[]" id="municipality" class="form-select select2" multiple>
                                <option value="">Select Municipality</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>


                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image
                            </label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-one btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-one " id="addCategoryBtn">
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
    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="category_id" id="editCategoryId">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="text" name="category" class="form-control" id="editCategoryName"
                                placeholder="Enter category name">
                            <div class="invalid-feedback" id="editCategoryNameError"></div>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="editRegion" class="form-label">Regions</label>
                            <select name="regions[]" id="editRegion" class="form-select select2" multiple>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" id="editRegionError"></div>
                        </div> --}}

                        <div class="mb-3 d-none">
                            <label for="editProvinces" class="form-label">Provinces</label>
                            <select name="provinces[]" id="editProvinces" class="form-select select2" multiple></select>
                            <div class="invalid-feedback" id="editProvincesError"></div>
                        </div>

                     {{--   <div class="mb-3">
                            <label for="editMunicipality" class="form-label">Municipalities</label>
                            <select name="municipality[]" id="editMunicipality" class="form-select select2"
                                multiple></select>
                            <div class="invalid-feedback" id="editMunicipalityError"></div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea name="description" id="editDescription" class="form-control"></textarea>
                            <div class="invalid-feedback" id="editDescriptionError"></div>
                        </div>

                        <div class="mb-3">
                            <label for="editImage" class="form-label">Category Image</label>
                            <input type="file" name="image" id="editImage" class="form-control" accept="image/*">
                            <div class="mt-2">
                                <img id="editImagePreview" src="" alt="Current Image"
                                    style="max-height: 150px; display: none;">
                            </div>
                            <div class="invalid-feedback" id="editImageError"></div>
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
    {{-- script for jquery datatable --}}
    <!-- Make sure jQuery is loaded first -->



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Select2 CSS & JS -->


    <script>
        $(document).ready(function() {

            function initSelect2() {
                $('.select2').select2({
                    width: '100%',
                    placeholder: "Select options",
                    allowClear: true,
                    dropdownParent: $('#addCategoryModal') // important for modals
                });
            }

            // Initialize on page load
            initSelect2();

            // Reinitialize when modals open
            $('#addCategoryModal, #editCategoryModal').on('shown.bs.modal', function() {
                $(this).find('.select2').select2({
                    width: '100%',
                    placeholder: "Select options",
                    allowClear: true,
                    dropdownParent: $(this) // attach dropdown inside modal
                });
            });


            // Region -> Province -> Municipality chain
            // $('#region').on('change', function() {
            //     let regionIds = $(this).val();
            //     if (regionIds && regionIds.length > 0) {
            //         // loadProvinces(regionIds, '#provinces');
            //         loadMunicipalities(regionIds, '#municipality');
            //     } else {
            //         $('#provinces').empty().trigger('change');
            //         $('#municipality').empty().trigger('change');
            //     }
            // });

            // $('#editRegion').on('change', function() {
            //     let regionIds = $(this).val();
            //     if (regionIds && regionIds.length > 0) {
            //         // loadProvinces(regionIds, '#editProvinces');
            //         loadMunicipalities(regionIds, '#editMunicipality');
            //     } else {
            //         $('#editProvinces').empty().trigger('change');
            //         $('#editMunicipality').empty().trigger('change');
            //     }
            // });

            // $('#editProvinces').on('change', function() {
            //     let provinceIds = $(this).val();
            //     if (provinceIds && provinceIds.length > 0) {
            //         loadMunicipalities(provinceIds, '#editMunicipality');
            //     } else {
            //         $('#editMunicipality').empty().trigger('change');
            //     }
            // });

            // $('#provinces').on('change', function() {
            //     let provinceIds = $(this).val();
            //     if (provinceIds && provinceIds.length > 0) {
            //         loadMunicipalities(provinceIds, '#municipality');
            //     } else {
            //         $('#municipality').empty().trigger('change');
            //     }
            // });

            // Edit Category - Open Modal with all data
          $(document).on('click', '.edit-category', function() {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let image = $(this).data('image');
    // let regions = $(this).data('regions');
    let provinces = $(this).data('provinces');
    // let municipalities = $(this).data('municipalities');
    let description = $(this).data('description');

// console.log(regions);


    // Reset form
    $('#editCategoryForm')[0].reset();
    $('#editRegion, #editProvinces, #editMunicipality').val(null).trigger('change');
    $('#editImagePreview').hide();

    // Fill values
    $('#editCategoryId').val(id);
    $('#editCategoryName').val(name);
    $('#editDescription').val(description);



    if (image) {
        $('#editImagePreview').attr('src', image).show();
    }

    $('#editCategoryModal').modal('show');
});


            // Image preview for edit form
            $('#editImage').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#editImagePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Helper functions
            function loadProvinces(regionIds, targetSelector, selectedProvinces = null) {
                $.ajax({
                    url: '/admin/get-provinces',
                    type: 'POST',
                    data: {
                        region_ids: regionIds,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let $select = $(targetSelector);
                        $select.empty();

                        $.each(data, function(key, province) {
                            $select.append($('<option>', {
                                value: province.id,
                                text: province.name
                            }));
                        });

                        // if (selectedProvinces) {
                        //     setTimeout(function() {
                        //         $select.val(selectedProvinces).trigger('change');

                        //         // Load municipalities if provinces are selected
                        //         if (selectedProvinces && selectedProvinces.length >
                        //             0) {
                        //             setTimeout(function() {
                        //                 loadMunicipalities(
                        //                     selectedProvinces,
                        //                     '#editMunicipality',
                        //                     response.municipalities);
                        //             }, 300);
                        //         }
                        //     }, 300);
                        // }

                        $select.trigger('change');
                    }
                });
            }

            // function loadMunicipalities(provinceIds, targetSelector, selectedMunicipalities = null) {
            //     $.ajax({
            //         url: '/admin/get-municipalities',
            //         type: 'POST',
            //         data: {
            //             province_ids: provinceIds,
            //             _token: $('meta[name="csrf-token"]').attr('content')
            //         },
            //         success: function(data) {
            //             let $select = $(targetSelector);
            //             $select.empty();

            //             $.each(data, function(key, muni) {
            //                 $select.append($('<option>', {
            //                     value: muni.id,
            //                     text: muni.name
            //                 }));
            //             });

            //             if (selectedMunicipalities) {
            //                 setTimeout(function() {
            //                     $select.val(selectedMunicipalities).trigger(
            //                         'change');
            //                 }, 300);
            //             }

            //             $select.trigger('change');
            //         }
            //     });
            // }

            // Rest of your existing code (add/delete category)...
        });
        $(document).ready(function() {


            $('#categoryTable').DataTable();

            // Add Category
            $("#addCategoryForm").submit(function(e) {
                e.preventDefault();

                let form = $(this)[0];
                console.log(form);
                let formData = new FormData(form);

                let submitBtn = $("#addCategoryBtn");
                let spinner = submitBtn.find(".spinner-border");

                // Reset validation errors
                $(".form-control, .form-select, input[type=file]").removeClass("is-invalid");
                $(".invalid-feedback").text("");

                // Loading state
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: '{{ route('admin.addcategory') }}',
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
                                title: "Category Added",
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false,
                            });

                            $("#addCategoryModal").modal("hide");
                            form.reset();
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Add Failed",
                                text: response.message ||
                                    "Unable to add category. Please try again.",
                            });
                        }
                    },
                    error: function(xhr) {
                            submitBtn.prop("disabled", false);
                            spinner.addClass("d-none");

                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;

                                // Swal ek hi baar fire karo
                                Swal.fire({
                                    icon: "error",
                                    title: "Validation Error",
                                    text: "Please correct the highlighted fields.",
                                });

                                // Har field par error show karo
                                $.each(errors, function(field, messages) {
                                    let input = $(`[name="${field}"], [name="${field}[]"]`);
                                    input.addClass("is-invalid");

                                    let errorDiv = input.closest(".mb-3").find(
                                        ".invalid-feedback");
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

                        ,
                });
            });


            // Edit Category - Open Modal
            $(document).on('click', '.edit-category', function() {
                let categoryId = $(this).data('id');
                let categoryName = $(this).data('name');

                $('#editCategoryId').val(categoryId);
                $('#editCategoryName').val(categoryName);
                $('#editCategoryModal').modal('show');
            });

            // Edit Category - Submit
            $("#editCategoryForm").submit(function(e) {
                e.preventDefault();

                let form = $(this); // jQuery object
                let formData = new FormData(this); // raw DOM element pass kiya (this)

                let submitBtn = $("#editCategoryBtn");
                let spinner = submitBtn.find(".spinner-border");

                // Reset validation states
                $("#editCategoryForm .form-control, #editCategoryForm .form-select").removeClass(
                    "is-invalid");
                $("#editCategoryForm .invalid-feedback").text("");

                // Show loading
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");

                $.ajax({
                    url: "{{ route('admin.updatecategory') }}",
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
                                text: response.message || "Unable to update category.",
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            // Reset old errors
                            $("#editCategoryForm .form-control, #editCategoryForm .form-select")
                                .removeClass("is-invalid");
                            $("#editCategoryForm .invalid-feedback").text("");

                            $.each(errors, function(key, messages) {
                                // select correct input (handle array fields like regions[], provinces[], etc.)
                                let input = form.find('[name="' + key + '"], [name="' +
                                    key + '[]"]');

                                if (input.length > 0) {
                                    input.addClass("is-invalid");

                                    // Error div ko locate karo inside same .mb-3
                                    input.closest(".mb-3").find(".invalid-feedback")
                                        .text(messages[0]);
                                }

                                // Agar file input hai (image)
                                if (key === "image") {
                                    $("#editImage").addClass("is-invalid");
                                    $("#editImage").closest(".mb-3").find(
                                        ".invalid-feedback").text(messages[0]);
                                }
                            });

                            Swal.fire({
                                icon: "error",
                                title: "Validation Error",
                                text: "Please fix the highlighted fields.",
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
                let categoryId = $(this).data('id');

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
                            url: '{{ route('admin.deletecategory') }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                category_id: categoryId
                            },
                            beforeSend: function() {
                                $('.delete-category[data-id="' + categoryId + '"]')
                                    .html(
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
                                    $('#category-row-' + categoryId).remove();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Delete Failed',
                                        text: response.message ||
                                            'Unable to delete category.',
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
                                $('.delete-category[data-id="' + categoryId + '"]')
                                    .html('<i class="fas fa-trash"></i> Delete');
                            }
                        });
                    }
                });
            });
        });
    </script>






@endsection
