<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="{{ asset('admin/img/coin.ico')}}" rel="icon">

    <!-- Favicon -->
    <link href="{{ asset('admin/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/calender.css')}}" rel="stylesheet">
</head>

<body style="overflow-x: hidden;">
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('layouts.includes.admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <!-- Navbar Start -->
            @include('layouts.includes.admin.topbar')
            <!-- Navbar End -->

            @yield('admin_content')

            <!-- Footer Start -->
            @include('layouts.includes.admin.footer')
            <!-- Footer End -->

        </div>
        <!-- Content End -->

        <!--Password Change Modal -->
        <div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                <h5 class="modal-title" id="changeModalLabel">Change Password</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/update-password')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><b>Password <span class="text-danger">*</span></b></label>
                            <input id="password" type="password" class="form-control"
                                name="password" required
                                autocomplete="new-password">
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label"><b>Confirm Password <span class="text-danger">*</span></b></label>
                            <input id="password-confirm" type="password" 
                                class="form-control "
                                name="password_confirmation" required
                                autocomplete="new-password"> 
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/lib/chart/chart.min.js')}}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js"></script> --}}
    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js')}}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>

</html>