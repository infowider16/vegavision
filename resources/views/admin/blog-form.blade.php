@extends('admin.layouts.master')

@section('title', isset($blog) ? 'Edit Blog' : 'Add Blog')

@section('content')
<style>
    .ck-editor { width: 100%; }
    .ck-editor__editable_inline { min-height: 350px; max-height: 600px; }

    .img-preview {
        margin-top: 10px;
        width: 140px;
        height: auto;
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 6px;
        display: none;
    }
</style>

<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">
        <div class="card">
            <div class="card-body">

                <form id="blogForm"
                      action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @if(isset($blog))
                        @method('PUT')
                    @endif

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ (old('category_id') ?? $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ old('title') ?? $blog->title ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>

                    {{-- Subtitle --}}
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                               value="{{ old('subtitle') ?? $blog->subtitle ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>

                    {{-- Cover Image --}}
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control" accept="image/*">
                        <div class="invalid-feedback"></div>

                        {{-- Preview area --}}
                        <img id="coverPreview"
                             class="img-preview"
                             src="{{ isset($blog) && $blog->cover_image ? asset('storage/'.$blog->cover_image) : '' }}"
                             alt="Cover Preview">
                    </div>

                    {{-- Content --}}
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="5">{{ old('content') ?? $blog->content ?? '' }}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <button type="submit" id="blogSubmitBtn" class="btn-one">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="btn-text">{{ isset($blog) ? 'Update Blog' : 'Add Blog' }}</span>
                    </button>

                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // ---------------------------
    // 1) Show existing image preview on edit
    // ---------------------------
    const previewImg = document.getElementById("coverPreview");
    if (previewImg && previewImg.getAttribute("src")) {
        previewImg.style.display = "block";
    }

    // ---------------------------
    // 2) Live image preview when user selects new image (add/edit)
    // ---------------------------
    $("#cover_image").on("change", function () {
        const file = this.files && this.files[0];

        if (!file) {
            // If user removed selection
            // On edit you may want to keep old preview; so we won't hide automatically here.
            return;
        }

        // Only images
        if (!file.type.startsWith("image/")) {
            Swal.fire({
                icon: "error",
                title: "Invalid file",
                text: "Please select an image file.",
            });
            $(this).val("");
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            $("#coverPreview").attr("src", e.target.result).show();
        };
        reader.readAsDataURL(file);
    });

    // ---------------------------
    // 3) CKEditor init
    // ---------------------------
    let editorInstance = null;
    if (document.querySelector('#content')) {
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => { editorInstance = editor; })
            .catch(error => console.error(error));
    }

    // ---------------------------
    // 4) AJAX Submit (store/update)
    // ---------------------------
    $("#blogForm").on("submit", function (e) {
        e.preventDefault();

        // Clear old validation
        $("#blogForm .is-invalid").removeClass("is-invalid");
        $("#blogForm .invalid-feedback").text("");

        // Put CKEditor HTML into textarea before sending
        if (editorInstance) {
            $("#content").val(editorInstance.getData());
        }

        const form = this;
        const formData = new FormData(form);

        const submitBtn = $("#blogSubmitBtn");
        const spinner = submitBtn.find(".spinner-border");

        submitBtn.prop("disabled", true);
        spinner.removeClass("d-none");

        $.ajax({
            url: $(form).attr("action"),
            method: "POST", // keep POST; Laravel uses _method=PUT for edit
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                submitBtn.prop("disabled", false);
                spinner.addClass("d-none");

                if (response.status == 1) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message || "Saved successfully",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = "{{ route('admin.blogs.list') }}";
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Failed",
                        text: response.message || "Something went wrong",
                    });
                }
            },
            error: function (xhr) {
                submitBtn.prop("disabled", false);
                spinner.addClass("d-none");

                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        // handle names like content, category_id, cover_image etc.
                        const fieldName = field.replace(/\./g, "\\.");
                        const input = $(`[name="${fieldName}"]`);

                        input.addClass("is-invalid");

                        // find feedback inside same mb-3
                        let feedback = input.closest(".mb-3").find(".invalid-feedback");
                        feedback.text(messages[0]);
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

});
</script>
@endsection
