@extends('admin.layouts.admin-login')

@section('title', 'Admin Login')

@section('content')
<style>
    .sign-up-top .sign-up-main .sign-up-logo{
        position:  relative !important;
    }
 .sign-up-top .sign-up-main .sign-up-logo img{
        width:100%;
    }
</style>
<form method="POST" action="{{ route('admin.adminlogin') }}" class="" novalidate="">
    @csrf
    <div class="sign-up-from">
        <div class="sign-up-from-item">

            <div class="sign-up-from-inner">
                <input type="email" class="form-control" name="email" placeholder="Username or email">
                <span class="text-danger error-text email_error"></span>
            </div>

            <div class="sign-up-from-inner">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="text-danger error-text password_error"></span>
            </div>


            <div class="sign-up-btn">
                <div class="btn-one">
                    <button type="submit">Sign In</button>
                </div>
            </div>



        </div>

    </div>
</form>
<div class="sign-up-from">
    <div class="sign-up-from-item">

        <div class="sign-up-from-inner">
            <div class="main-btn">
                <button type="button" class="modal-sign-up-from-btn" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-3" data-bs-dismiss="modal">
                    Forgot Password?
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal-3" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-six">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">


                                <div class="modal-sign-up-logo">
                                    <img src="{{ asset('assets/images/vega-logo.png')}}" alt="logo" style="width:89%;">
                                </div>
                                <div class="modal-sign-up-text">
                                    <h2>Forgot Password</h2>
                                    <p>Please enter Email</p>
                                </div>

                                <form id="forgotPasswordForm">
                                    @csrf
                                    <div class="modal-sign-up-from">
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput2" placeholder="Email" required>
                                    </div>

                                    <button type="submit" class="btn-one-modal mt-4">
                                        Submit
                                    </button>
                                </form>


                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).on('submit', '#forgotPasswordForm', function(e) {
    e.preventDefault();

    let form = $(this);
    let submitBtn = form.find('button[type="submit"]');
    let emailInput = form.find('input[name="email"]');

    // Clear previous errors
    emailInput.removeClass('is-invalid');
    form.find('.text-danger').remove();

    $.ajax({
        url: '{{ route("admin.send-forgot-password-link") }}',
        method: 'POST',
        data: form.serialize(),
        beforeSend: function() {
            submitBtn.prop('disabled', true).text('Sending...');
        },
        success: function(response) {
            submitBtn.prop('disabled', false).text('Submit');

            if (response.status === 200 || response.status === 1) {
                // ✅ SUCCESS: Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                });

                $('#exampleModal-3').modal('hide');
                form[0].reset();
            } else {
                // ❌ Custom error: Show under field only
                emailInput.addClass('is-invalid');
                emailInput.after(`<div class="text-danger">${response.message || 'Email not found.'}</div>`);
            }
        },
        error: function(xhr) {
            submitBtn.prop('disabled', false).text('Submit');

            let response = xhr.responseJSON;

            if (xhr.status === 422 && response?.errors?.email) {
                emailInput.addClass('is-invalid');
                emailInput.after(`<div class="text-danger">${response.errors.email[0]}</div>`);
            } else {
                emailInput.addClass('is-invalid');
                emailInput.after(`<div class="text-danger">Something went wrong. Please try again.</div>`);
            }
        }
    });
});




    $(document).ready(function() {
        $(document).on('submit', 'form[action="{{ route("admin.adminlogin") }}"]', function(e) {
            e.preventDefault();

            // Clear old errors
            $('.error-text').text('');

            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    // Optional: redirect to dashboard
                    window.location.href = response.redirect;
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, val) {
                            $('.' + key + '_error').text(val[0]);
                        });
                    } else {
                        alert("Something went wrong!");
                    }
                }
            });
        });
    });
</script>