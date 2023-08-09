<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css')}}">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png')}}" type="image/x-icon">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css')}}">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css')}}">
    <!-- nice select css -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css')}}">
</head>

<body>


    <div class="page-wrapper">

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Header
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <header class="header-section header-section-one">
            <div class="header">
                <div class="header-bottom-area">
                    <div class="container-fluid">
                        <div class="header-menu-content">
                            <nav class="navbar navbar-expand-lg p-0">
                                <!-- <a class="site-logo site-title" href="index-2.html"><img src="assets/images/logo.png"
                                        alt="site-logo"></a> -->
                                        <div class="navbar-header white">
                                                    <span class="sub-title text-white"><span style="color:white">Trip</span><span> Builder</span>
                                                </div>
                                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="fas fa-bars"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav main-menu ml-auto">
                                       
                                        
                                        <li><a href="#">Customer Support</a></li>
                                        <li><a href="#">My Bookings</a></li>
                                    </ul>
                                    <div class="header-right">
                                        <div class="search-bar d-none d-lg-block">
                                           
                                        </div>
                                        <div class="header-action-area">
                                            <div class="header-action">
                                                <a href="service-details.html" class="btn--base"><i
                                                        class="icon-name_icone"></i> Sign In</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Header
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="banner-section">
        </section>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <a href="#" class="scrollToTop">
            <i class="las la-dot-circle"></i>
            <span>Top</span>
        </a>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <main>
        @yield('content')
    </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Footer
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <footer class="footer-section section--bg pt-0">
           
            <div class="container">
                <div class="copyright-area">
                    <div class="social-area">
                        <ul class="footer-social">
                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#0" class="active"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <p>© 2023 Trip Builder Airlines. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Footer
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
</body>
</html>