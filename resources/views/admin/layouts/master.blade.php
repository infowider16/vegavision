<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from quomodosoft.com/html/bankcohtml/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Jul 2025 12:15:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> {{env('APP_NAME')}}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- fave-icon  -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon2.ico.png') }}" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;900&amp;display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

</head>

<body>
  <div class="body-bg">
    @include('admin.layouts.side-menu')
    @include('admin.layouts.navbar')
       
    @yield('content')
 </div>
 <script src="{{ asset('assets/admin/js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{ asset('assets/admin/js/slick.min.js')}}"></script>
  <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/admin/js/chart.js')}}"></script>
  <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
  <script src="{{ asset('assets/admin/js/modeControl.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

   <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->



  @yield('scripts')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Function to update unread count badge
        function updateUnreadBadge(count) {
            const badge = document.getElementById('support-unread-badge');
            if (badge) {
                if (count > 0) {
                    badge.textContent = count;
                    badge.style.display = 'inline-flex';
                } else {
                    badge.style.display = 'none';
                }
            }
        }

        // Function to get current unread count
        function getUnreadCount() {
            $.get('/admin/get-unread-count', function(response) {
                if (response.status) {
                    updateUnreadBadge(response.count);
                }
            }).fail(function() {
                console.log('Failed to get unread count');
            });
        }

        // Initialize Pusher for real-time updates
        $(document).ready(function() {
            // Get initial count
            getUnreadCount();

            // Setup Pusher for real-time updates
            Pusher.logToConsole = false;
            var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                encrypted: true
            });

            var channel = pusher.subscribe('admin-support');

            // Listen for new messages (increase count)
            channel.bind('App\\Events\\MessageSentEvent', function(data) {
                if (data.sender_type === 'user' || data.sender_type === 'guest') {
                    // Refresh count when user sends message
                    getUnreadCount();
                }
            });

            // Listen for message read events (decrease count)
            channel.bind('App\\Events\\MessageReadEvent', function(data) {
                if (data.reader_type === 'admin') {
                    // Refresh count when admin reads messages
                    getUnreadCount();
                }
            });
        });
    </script>
</body>
</html>