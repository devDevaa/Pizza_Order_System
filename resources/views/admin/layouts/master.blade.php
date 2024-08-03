<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    {{-- <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all"> --}}
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    {{-- bootstrap link --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    {{-- fontawesom cdn --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div>
                        <h3>Admin Dashboard Panel</h3>
                    </div>
                    {{-- <form class="form-header" action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="search"
                                        placeholder="Search for datas &amp; reports..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form> --}}
                    <div class="header-button">
                        <a href="{{ route('customer#getReview') }}">
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">3</span>
                                </div>
                            </div>
                        </a>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                {{-- profile section --}}
                                <div class="image ">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'male')
                                            <img src="{{ asset('image/male_user.png') }}"
                                                class=" img-thumbnail shadow-sm" alt="">
                                        @else
                                            <img src="{{ asset('image/female_user.png') }}"
                                                class=" img-thumbnail shadow-sm" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="John Doe" />
                                    @endif
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn text-decoration-none"
                                        href="#">{{ Auth::user()->name }}</a>
                                </div>

                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">

                                        {{-- profile image drop down --}}
                                        <div class="image ">
                                            <a href="#">
                                                @if (Auth::user()->image == null)
                                                    @if (Auth::user()->gender == 'male')
                                                        <img src="{{ asset('image/male_user.png') }}"
                                                            class=" img-thumbnail shadow-sm" alt="">
                                                    @else
                                                        <img src="{{ asset('image/female_user.png') }}"
                                                            class=" img-thumbnail shadow-sm" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" />
                                                @endif
                                            </a>
                                        </div>

                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"
                                                    class="text-decoration-none">{{ Auth::user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('admin#details') }}" class="text-decoration-none">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('admin#list') }}" class="text-decoration-none">
                                                <i class="zmdi zmdi-accounts"></i>Admin List</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('admin#changePasswordPage') }}"
                                                class="text-decoration-none">
                                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Change
                                                Password</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <form action="{{ route('logout') }}" method="POST"
                                            class=" d-flex justify-content-center my-3">
                                            @csrf
                                            <button class=" btn bg-dark text-white col-10 " type="submit">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                <small>Logout</small>
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
    </header>
    <!-- HEADER DESKTOP-->
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list ">
                        <li class=" px-3 shadow-sm">
                            <a href="{{ route('category#list') }}" class="text-decoration-none">
                                <i class="fas fa-chart-bar"></i>Category</a>

                        </li>

                        <li class=" px-3 shadow-sm">
                            <a href="{{ route('product#list') }}" class="text-decoration-none">
                                <i class="fa fa-arrows"></i>Product</a>
                        </li>

                        <li class=" px-3 shadow-sm">
                            <a href="{{ route('order#list') }}" class="text-decoration-none">
                                <i class="fa-solid fa-receipt"></i>Order List</a>
                        </li>
                        <li class=" px-3 shadow-sm">
                            <a href="{{ route('admin#accountList') }}" class="text-decoration-none">
                                <i class="fa-solid fa-user"></i>Account List</a>
                        </li>
                        <li class=" px-3 shadow-sm">
                            <a href="{{ route('customer#getReview') }}" class="text-decoration-none">
                                <i class="fa-solid fa-comments"></i>Customer Review</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        @yield('content')
    </div>
    <!-- Jquery JS-->
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
    {{-- bootstrap Js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}
    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    {{-- Jquery cdn link --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

</body>
    @yield('scriptSource')
</html>
<!-- end document-->
