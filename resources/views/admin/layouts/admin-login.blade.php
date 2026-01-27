<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from quomodosoft.com/html/bankcohtml/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jul 2025 12:16:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>

    <!-- fave-icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon2.ico') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body>







    <div class="sign-up-top">

        <div class="sign-up-main">
            <div class="sign-up-logo">
                <img src="{{ asset('assets/images/vega-logo.png')}}" alt="logo">
            </div>
            <div class="sign-up-text">
                <h2>Admin Login.</h2>
                
            </div>


            @yield('content')


        </div>
        <div class="sign-up-main-two">

            <div class="sign-up-main-two-item">
                <div class="sign-up-img">
                    <img src="{{ asset('assets/admin/images/sign-up.svg')}}" alt="img">
                </div>

                <div class="sign-up-main-two-item-text">
                    <h2>Speady, Easy and Fast</h2>
                    <p>BankCo. help you set saving goals, earn cash back offers, Go to disclaimer for more details and
                        get paychecks up to two days early. Get a $20 bonus when you receive qualifying direct deposits
                    </p>
                </div>
            </div>


        </div>

    </div>






    <script src="{{ asset('assets/admin/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/slick.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>


</html>