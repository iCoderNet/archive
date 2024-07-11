<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'De Archive')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/assets/img//logo/1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">

    @yield('style')
    @yield('top_script')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid  px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
                <!-- <h1 class="display-6 text-primary m-0">Archive</h1> -->
                <img src="/assets/img/logo/1.png" alt="logo" width="40" height="40">
                 <img src="/assets/img/logo/2.png" alt="logo" width="40" height="40">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('base.home') }}</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('search.advanced') ? 'active' : '' }}" data-bs-toggle="dropdown">{{ __('base.search') }}</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="{{ route('search.advanced') }}" class="dropdown-item">{{ __('base.advanced_search') }}</a>
                            <a href="{{ route('search.advanced') }}" class="dropdown-item">{{ __('base.show_map') }}</a>
                        </div>
                    </div>
                    <a href="{{ route('person') }}" class="nav-item nav-link {{ request()->routeIs('person') ? 'active' : '' }}">{{ __('base.person') }}</a>
                    <a href="{{ route('faq') }}" class="nav-item nav-link {{ request()->routeIs('faq') ? 'active' : '' }}">{{ __('base.faq') }}</a>
                    <a href="{{ route('suggest') }}" class="nav-item nav-link {{ request()->routeIs('suggest') ? 'active' : '' }}">{{ __('base.suggest_material') }}</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('base.contact') }}</a>
                </div>
                <div class="d-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="/lang/ru">
                        <small class="text-uppercase fw-bold text-primary">RU</small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="/lang/de">
                        <small class="text-uppercase fw-bold text-primary">DE</small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="/lang/en">
                        <small class="text-uppercase fw-bold text-primary">EN</small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    @yield('content')


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/wow/wow.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>

    @yield('script')

</body>

</html>
