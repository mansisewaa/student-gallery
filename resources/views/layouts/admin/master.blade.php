<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Gallery Admin</title>

    <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/select.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifi co&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-logo {
            font-family: 'Pacifico', cursive;
            font-size: 24px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        @include('layouts.admin.navbar')

        <div class="container-fluid page-body-wrapper">

            @include('layouts.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session('success'))
                    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
                        <div class="toast align-items-center text-white bg-success border-0 show" role="alert">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
                        <div class="toast align-items-center text-white bg-danger border-0 show" role="alert">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <div class="alert alert-danger"> {{ session('error') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif

                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
                    </div>
                </footer>

            </div>

        </div>

    </div>

    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.select.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toastEl = document.querySelector('.toast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl, {
                    delay: 5000
                });
                toast.show();
            }
        });
    </script>
</body>

</html>
