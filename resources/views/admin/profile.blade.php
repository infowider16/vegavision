@extends('admin.layouts.master')

@section('title', 'Admin Login')

@section('content')
<!-- NFTmax Dashboard -->
<section class="nftmax-adashboard nftmax-show">
    <div class="container-fulid">
        <div class="row">
            <div class="col-lg-12 setting-main  ">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke-width="1.5"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="7" r="4" stroke-width="1.5" stroke-linejoin="round" />
                                </svg>
                            </span>

                            Personal Informations
                        </button>
                        <button class="nav-link" id="v-pills-settings-tab-2" data-bs-toggle="pill"
                            data-bs-target="#v-pills-settings-2" type="button" role="tab"
                            aria-controls="v-pills-settings-2" aria-selected="false">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            Security
                        </button>
                        <button class="nav-link" id="v-pills-site-setting-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-site-setting" type="button" role="tab"
                            aria-controls="v-pills-site-setting" aria-selected="false">
                            <span>
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 12h18M3 6h18M3 18h18" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </span>
                            Site Settings
                        </button>

                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">

                            <form id="adminProfileForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="personal-informations-head">
                                            <h3>Personal Informations</h3>
                                        </div>



                                        <div class="personal-informations-from">


                                            <div class="personal-informations-from-item">

                                                <div class="personal-informations-from-item-inner">
                                                    <div class="row  ">
                                                        <div class="col-12 col-md-12 col-lg-6 ">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Name</label>
                                                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">

                                                        </div>
                                                        <div class="col col-12 col-md-12 col-lg-6 ">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="personal-informations-from-btn">
                                                <div class="btn-one">
                                                    <button type="submit">Save Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-padding-0">

                                        <!-- <div class="up-date-profile-main">
                                            <div class="up-date-profile">
                                                <h2>Update Profile</h2>


                                            </div>


                                            <div class="up-date-profile-img">
                                                <img id="previewImage" src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('assets/admin/images/Update-profile.png') }}" alt="Profile Image">

                                                <div class="up-date-profile-img-btn">
                                                    <input type="file" name="profile_image" id="profileImageInput" style="display: none;" accept="image/*">

                                                    <button type="button" onclick="document.getElementById('profileImageInput').click();">

                                                        <span>
                                                            <svg width="29" height="29" viewBox="0 0 29 29"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="14.2414" cy="14.2414" r="14.2414"
                                                                    fill="#22C55E"></circle>
                                                                <path
                                                                    d="M14.6994 10.2363C15.7798 11.3167 16.8434 12.3803 17.9171 13.454C17.7837 13.584 17.6403 13.7174 17.5036 13.8574C15.5497 15.8114 13.5924 17.7653 11.6385 19.7192C11.5118 19.8459 11.3884 19.9726 11.2617 20.0927C11.2317 20.1193 11.185 20.1427 11.145 20.1427C10.1281 20.146 9.11108 20.1427 8.0941 20.146C8.02408 20.146 8.01074 20.1193 8.01074 20.0593C8.01074 19.049 8.01074 18.0354 8.01408 17.0251C8.01408 16.9784 8.03742 16.9217 8.06743 16.8917C9.26779 15.688 10.4682 14.4876 11.6685 13.2873C12.6655 12.2903 13.6591 11.2967 14.6561 10.2997C14.6761 10.2797 14.6861 10.253 14.6994 10.2363Z"
                                                                    fill="white"></path>
                                                                <path
                                                                    d="M18.6467 12.7197C17.573 11.646 16.506 10.579 15.4424 9.51537C15.6324 9.31864 15.8292 9.11858 16.0259 8.91852C16.256 8.68845 16.4894 8.45838 16.7228 8.22831C17.0162 7.93822 17.4197 7.93822 17.7097 8.22831C18.4466 8.9552 19.1802 9.68542 19.9171 10.4123C20.2038 10.6957 20.2138 11.0992 19.9371 11.3859C19.5136 11.8261 19.0868 12.2629 18.6634 12.703C18.66 12.7097 18.65 12.7163 18.6467 12.7197Z"
                                                                    fill="white"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>

                            </form>




                        </div>
                        <div class="tab-pane fade" id="v-pills-settings-2" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab-2">

                            <form id="change-password-form">
                                @csrf
                                <div class="row   w-1150px align-items-center">
                                    <div class="col-lg-7">
                                        <div class="password-head">
                                            <h2>Password</h2>
                                            <p>Change or view your password.</p>
                                        </div>

                                        <div class="password-from-item">
                                            <div class="password-from-inner">
                                                <label for="exampleFormControlInput1" class="form-label">Old
                                                    password</label>
                                                <input input type="password" name="current_password" class="form-control"
                                                    id="exampleFormControlInput10">


                                            </div>
                                            <div class="password-from-inner">
                                                <label for="exampleFormControlInput1" class="form-label">New
                                                    password</label>
                                                <input type="password" name="new_password" class="form-control"
                                                    id="exampleFormControlInput11">




                                            </div>
                                            <div class="password-from-inner">
                                                <label for="exampleFormControlInput12" class="form-label">Confirm password</label>
                                                <input type="password" name="confirm_password" class="form-control"
                                                    id="exampleFormControlInput12">
                                            </div>
                                        </div>

                                        <div class="password-from-item-btn">
                                            <div class="btn-one">
                                                <button type="submit">Save Changes
                                                </button>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-lg-5">
                                        <div class="password-img">
                                            <img src="{{ asset('assets/admin/images/reset-password.png')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="tab-pane fade" id="v-pills-site-setting" role="tabpanel" aria-labelledby="v-pills-site-setting-tab">
                            <form id="siteSettingForm">
                                @csrf
                                <div class="row w-100">
                                    <div class="col-lg-8">
                                        <div class="personal-informations-head">
                                            <h3>Site Settings</h3>
                                        </div>

                                        <div class="personal-informations-from">
                                            <div class="personal-informations-from-item">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" class="form-control" value="{{ $settings['address'] ?? '' }}">
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}">
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Facebook</label>
                                                        <input type="url" name="facebook" class="form-control" value="{{ $settings['facebook'] ?? '' }}">
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Instagram</label>
                                                        <input type="url" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}">
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">LinkedIn</label>
                                                        <input type="url" name="linkedin" class="form-control" value="{{ $settings['linkedin'] ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Twitter</label>
                                                        <input type="url" name="twitter" class="form-control" value="{{ $settings['twitter'] ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Pinterest</label>
                                                        <input type="url" name="pinterest" class="form-control" value="{{ $settings['pinterest'] ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label class="form-label">Google</label>
                                                        <input type="url" name="google" class="form-control" value="{{ $settings['google'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="personal-informations-from-btn">
                                                <div class="btn-one">
                                                    <button type="submit">Save Settings</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
<!-- End NFTmax Dashboard -->
@endsection

@section('scripts')

<script>
    $('#siteSettingForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('admin.site-settings.update') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message || 'Site settings updated successfully.',
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Something went wrong!',
                    confirmButtonColor: '#d33'
                });
            }
        });
    });


    $(document).ready(function() {
        $('#adminProfileForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = new FormData(this);
            let submitButton = form.find('button[type="submit"]');

            // Clear previous errors
            form.find('.text-danger').remove();
            form.find('.is-invalid').removeClass('is-invalid');

            $.ajax({
                url: '{{ route("admin.profile.update") }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,

                beforeSend: function() {
                    submitButton.prop('disabled', true).text('Saving...');
                    Swal.fire({
                        title: 'Please wait...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },

                success: function(response) {
                    Swal.close();
                    submitButton.prop('disabled', false).text('Save Profile');

                    if (response.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Profile Updated!',
                            text: response.message || 'Profile updated!',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        if (response.image_url) {
                            $('#previewImage').attr('src', response.image_url);
                        }

                        setTimeout(() => {
                            location.reload(); // Refresh after success
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again.'
                        });
                    }
                },

                error: function(xhr) {
                    Swal.close();
                    submitButton.prop('disabled', false).text('Save Profile');

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function(field, messages) {
                            let input = form.find(`[name="${field}"]`);
                            input.addClass('is-invalid');

                            // Append error message after the input
                            if (input.length) {
                                input.after(`<div class="text-danger">${messages[0]}</div>`);
                            }
                        });


                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An unexpected error occurred.'
                        });
                    }
                }
            });
        });



        $('#profileImageInput').on('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });
    });
    $('#change-password-form').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let submitBtn = form.find('button[type="submit"]');

        // Clear previous error messages
        form.find('.text-danger').remove();
        form.find('.is-invalid').removeClass('is-invalid');

        $.ajax({
            url: '{{ route("admin.password.update") }}',
            method: 'POST',
            data: form.serialize(),

            beforeSend: function() {
                submitBtn.prop('disabled', true).text('Saving...');
                Swal.fire({
                    title: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },

            success: function(res) {
                Swal.close();
                submitBtn.prop('disabled', false).text('Save');

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: res.message || 'Password updated successfully!',
                    confirmButtonColor: '#3085d6'
                });

                form[0].reset(); // Optionally clear the form after success
            },

            error: function(xhr) {
                Swal.close();
                submitBtn.prop('disabled', false).text('Save');

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    let msg = '';
                    $.each(errors, function(key, messages) {
                        let input = form.find(`[name="${key}"]`);
                        input.addClass('is-invalid');

                        let allMessages = messages.map(msg => `<div class="text-danger">${msg}</div>`).join('');
                        input.after(allMessages);
                    });




                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An unexpected error occurred.',
                        confirmButtonColor: '#d33'
                    });
                }
            }
        });
    });


    //Theme controll 
    let darkMode = false
    if (darkMode) {
        document.getElementById("dark-icon").style.setProperty("display", "block")
        document.getElementById("light-icon").style.setProperty("display", "none")
        document.getElementsByClassName("logo")[0].style.setProperty("display", "none")
        document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "block")
    } else {
        document.getElementById("dark-icon").style.setProperty("display", "none")
        document.getElementById("light-icon").style.setProperty("display", "block")
        document.getElementsByClassName("logo")[0].style.setProperty("display", "block")
        document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "none")
    }



    document.getElementById("theme-controll").addEventListener("click", event => {
        darkMode = !darkMode
        const main = document.querySelector("html")
        main.classList.toggle("dark")

        if (darkMode) {

            document.documentElement.style.setProperty("--headding-color", "#fff")
            document.documentElement.style.setProperty("--paragraph-color", "#E2E8F0")
            document.documentElement.style.setProperty("--primary-color", "#22C55E")
            document.documentElement.style.setProperty("--warning-color", "#FACC15")
            document.documentElement.style.setProperty("--alerts-color", "#FF4747")
            document.documentElement.style.setProperty("--other-color", "#FF784B")
            document.documentElement.style.setProperty("--grey-color", "#2A313C")
            document.documentElement.style.setProperty("--grey-color-border", "#edf2f7")
            document.documentElement.style.setProperty("--body-bg-color", "#23262B")
            document.documentElement.style.setProperty("--bg-color", "#1D1E24")
            document.documentElement.style.setProperty("--greyscale-3", "#191B1F")
            document.documentElement.style.setProperty("--greyscale-4", "#293644")
            document.documentElement.style.setProperty("--greyscale-200", "rgba(226, 232, 240, 0.7)")
            document.documentElement.style.setProperty("--greyscale-1", "#2A313C")
            document.documentElement.style.setProperty("--bg-color-2", "#23262B")
            document.documentElement.style.setProperty("--bg-rgb", "#1D1E24")

            document.getElementById("dark-icon").style.setProperty("display", "block")
            document.getElementById("light-icon").style.setProperty("display", "none")
            document.getElementsByClassName("logo")[0].style.setProperty("display", "none")
            document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "block")
        } else {

            document.documentElement.style.setProperty("--headding-color", "#111827")
            document.documentElement.style.setProperty("--paragraph-color", "#747681")
            document.documentElement.style.setProperty("--primary-color", "#22C55E")
            document.documentElement.style.setProperty("--warning-color", "#FACC15")
            document.documentElement.style.setProperty("--alerts-color", "#FF4747")
            document.documentElement.style.setProperty("--other-color", "#FF784B")
            document.documentElement.style.setProperty("--grey-color", "#F7FAFC")
            document.documentElement.style.setProperty("--grey-color-border", "#edf2f7")
            document.documentElement.style.setProperty("--bg-color", "#FAFAFA")
            document.documentElement.style.setProperty("--body-bg-color", "#F6F6F6")
            document.documentElement.style.setProperty("--greyscale-200", "rgba(42, 49, 60, 0.7)")
            document.documentElement.style.setProperty("--greyscale-1", "#EDF2F7")
            document.documentElement.style.setProperty("--greyscale-3", "#EEEFF2")
            document.documentElement.style.setProperty("--greyscale-4", "#CBD5E0")
            document.documentElement.style.setProperty("--bg-color-2", "#f7fafc")
            document.documentElement.style.setProperty("--bg-rgb", "rgba(237, 242, 247, 0.5)")

            document.getElementById("dark-icon").style.setProperty("display", "none")
            document.getElementById("light-icon").style.setProperty("display", "block")
            document.getElementsByClassName("logo")[0].style.setProperty("display", "block")
            document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "none")
        }
    })
</script>
@endsection