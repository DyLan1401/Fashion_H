<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from wphix.com/template/vue/vue/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2023 08:29:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vue - Clean Minimal eCommerce HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    </head>
    <body>

    
    <!-- header start -->
        <header class="transparent-header">
            <div class="header-area box-90">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-6 col-md-6 col-7 col-sm-3 d-flex align-items-center">
                            <div class="basic-bar cat-toggle">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                            <div class="logo">
                                <a href="index.html"><img src="img/logo/logo.png" alt=""></a>
                            </div>
                            <div class="category-menu">
                                <h4>Category</h4>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="#"><i class="flaticon-shopping-cart-1"></i> {{ $category->category_name }}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ Route('/') }}">Home</a>
                                        </li>
                                        <li class="mega-menu">
                                            <a href="{{ Route('shop') }}">Shop</a>
                                        </li>
                                        <li>
                                            <a href="shop-filter.html">Products </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog-2-col.html">Blog 2 Column</a>
                                                </li>
                                                <li>
                                                    <a href="blog-2-col-mas.html">Blog 2 Col Masonry</a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-col.html">Blog 3 Column</a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-col-mas.html">Blog 3 Col Masonry</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details.html">Blog Details</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-audio.html">Blog Details Audio</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-video.html">Blog Details Video</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-gallery.html">Blog Details Gallery</a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-left-sidebar.html">Details Left Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="about.html">About Us</a>
                                                </li>

                                                <li>
                                                    <a href="contact.html">Contact Us</a>
                                                </li>
                                                <li>
                                                    <a href="login.html">login</a>
                                                </li>
                                                <li>
                                                    <a href="register.html">Register</a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">Shoping Cart</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-5 col-sm-9 pl-0">
                            <div class="header-right f-right">
                                <ul>
                                    <li class="search-btn">
                                        <a class="search-btn nav-search search-trigger" href="#"><i class="fas fa-search"></i></a>
                                    </li>
                                    <li class="login-btn"><a href="login.html"><i class="far fa-user"></i></a></li>
                                    <li class="d-shop-cart"><a href="{{ route('user.cart.index') }}"><i class="flaticon-shopping-cart"></i> <span class="cart-count">3</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 d-xl-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        @yield('content')
   <!-- footer start -->
        <footer>
            <div class="footer-area box-90 pt-100 pb-60">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5 col-md-6 ">
                            <div class="footer-widget mb-40">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="img/logo/footer-logo.png" alt=""></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore mag na
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="footer-time d-flex mt-30">
                                    <div class="time-icon">
                                        <img src="img/icon/time.png" alt="">
                                    </div>
                                    <div class="time-text">
                                        <span>Got Questions ? Call us 24/7!</span>
                                        <h2>(0600) 874 548</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                            <div class="footer-widget pl-50 mb-40">
                                <h3>Social Media</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Behance</a></li>
                                    <li><a href="#"> Dribbble</a></li>
                                    <li><a href="#">Linkedin</a></li>
                                    <li><a href="#">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 d-lg-none d-xl-block">
                            <div class="footer-widget pl-30 mb-40">
                                <h3>Location</h3>
                                <ul class="footer-link">
                                    <li><a href="#">New York</a></li>
                                    <li><a href="#">Tokyo</a></li>
                                    <li><a href="#">Dhaka</a></li>
                                    <li><a href="#"> Chittagong</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">Japan</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3">
                            <div class="footer-widget mb-40">
                                <h3>About</h3>
                                <ul class="footer-link">
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Wholesale</a></li>
                                    <li><a href="#">Direction</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-5 col-md-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-banner">
                                    <a href="shop.html"><img src="img/banner/add.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area box-105">
                <div class="container-fluid">
                    <div class="copyright-border pt-30 pb-30">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-7">
                                <div class="copyright text-center text-md-left">
                                    <p>Copyright © 2019 <a href="#">BasicTheme</a>. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-5">
                                <div class="footer-icon text-center text-md-right ">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
		<!-- JS here -->
        <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/one-page-nav-min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('js/ajax-form.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.final-countdown.min.js') }}"></script>
        <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>

<!-- Mirrored from wphix.com/template/vue/vue/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2023 08:30:09 GMT -->
</html>
