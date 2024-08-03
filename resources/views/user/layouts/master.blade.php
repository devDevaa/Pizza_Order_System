<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Fontfaces CSS-->
    <link href="{{ asset('user/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('user/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('user/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('user/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('user/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#" class="text-decoration-none d-block d-lg-none">
                                <span class="text-uppercase text-dark bg-light px-2">Multi</span>
                                <span class="text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                            </a>
                            <a href="{{ route('user#homePage') }}" class="nav-item nav-link active">Home</a>
                            <a href="cart.html" class="nav-item nav-link">My Cart</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <div class="btn-group">
                                <a href="{{ route('contact#form') }}" class="btn text-white bg-dark mt-1"> <i
                                        class="fa-solid fa-headset me-1"></i> Contact</a>

                                <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                    <a href="" class="btn px-0 ml-3 text-white bg-dark">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                         {{ Auth::user()->name }}
                                    </a>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item py-2" href="{{ route('account#details') }}">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        Account</a>
                                    <a class="dropdown-item py-2" href="{{ route('user#changePasswordPage') }}">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        Change Password</a>
                                    <a class="dropdown-item py-2" href="#">
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn bg-dark text-white w-100"><i
                                                    class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</button>
                                        </form>
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->




    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">



            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
                <div class="row px-xl-5 pt-5">
                    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                        <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                        <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor
                            seddolor. Rebum tempor no vero est magna amet no</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York,
                            USA</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Home</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Our
                                        Shop</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Shop
                                        Detail</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Checkout</a>
                                    <a class="text-secondary" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Contact
                                        Us</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Home</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Our
                                        Shop</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Shop
                                        Detail</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                                    <a class="text-secondary mb-2" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Checkout</a>
                                    <a class="text-secondary" href="#"><i
                                            class="fa fa-angle-right mr-2"></i>Contact
                                        Us</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                                <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Your Email Address">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Sign Up</button>
                                        </div>
                                    </div>
                                </form>
                                <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-square mr-2" href="www.facebook.com/">
                                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-primary btn-square mr-2" href="www.twitter.com/">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-primary btn-square mr-2" href="www.youtube.com">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-primary btn-square" href="www.linkedin.com">
                                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
                    <div class="col-md-6 px-xl-0">
                        <p class="mb-md-0 text-center text-md-left text-secondary">
                            &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                            by
                            <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                        </p>
                    </div>
                    {{-- <div class="col-md-6 px-xl-0 text-center text-md-right">
                        <img class="img-fluid" src="img/payments.png" alt="">
                    </div> --}}
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <div><a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
            </div>
            {{-- @yield('backToTop') --}}

            <script src="{{ asset('user/vendor/jquery-3.2.1.min.js') }}"></script>
            <!-- Bootstrap JS-->
            <script src="{{ asset('user/vendor/bootstrap-4.1/popper.min.js') }}"></script>
            <script src="{{ asset('user/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
            <!-- Vendor JS       -->
            <script src="{{ asset('user/vendor/slick/slick.min.js') }}"></script>
            <script src="{{ asset('user/vendor/wow/wow.min.js') }}"></script>
            <script src="{{ asset('user/vendor/animsition/animsition.min.js') }}"></script>
            <script src="{{ asset('user/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <script src="{{ asset('user/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('user/vendor/counter-up/jquery.counterup.min.js') }}"></script>
            <script src="{{ asset('user/vendor/circle-progress/circle-progress.min.js') }}"></script>
            <script src="{{ asset('user/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('user/vendor/chartjs/Chart.bundle.min.js') }}"></script>
            <script src="{{ asset('user/vendor/select2/select2.min.js') }}"></script>

            <!-- JavaScript Libraries -->
            {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
            <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

            {{-- <!-- Contact Javascript File -->
            <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
            <script src="{{ asset('user/mail/contact.js') }}"></script> --}}

            <!-- Template Javascript -->
            <script src="{{ asset('user/js/main.js') }}"></script>

            {{-- Jquery cdn link
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
                integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
</body>
@yield('scriptSource')

</html>
