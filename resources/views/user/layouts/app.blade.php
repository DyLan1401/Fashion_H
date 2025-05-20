<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from wphix.com/template/vue/vue/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Oct 2023 08:29:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vue - Clean Minimal eCommerce HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.html">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/owl-carousel')}}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css')}}">
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
                                        <li><a href="shop.html"><i class="flaticon-shopping-cart-1"></i> {{ $category->category_name }}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-8 col-8 d-none d-xl-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="mega-menu">
                                            <a href="shop.html">Shop</a>
                                            <ul class="submenu ">
                                                <li>
                                                    <a href="#">Category View</a>
                                                    <ul class="submenu  level-1">
                                                        <li>
                                                            <a href="shop.html">Shop 2 Column</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-filter.html">Shop Filter Style</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-full.html">Shop Full</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-3-col.html">Shop 3 Column</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list.html">List View</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Category View</a>
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="shop-left-sidebar.html">Sidebar Left</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-sidebar-right.html">Sidebar Right</a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.html">Shopping Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.html">Checkout</a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html">My Wishlist</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Products Types</a>
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="product-simple.html">Simple Product</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-variable.html">Variable Product</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-upcoming.html">Product Upcoming</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-up-thumb.html">Thumb Top Product</a>
                                                        </li>
                                                        <li>
                                                            <a href="product-sidebar.html">Product Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
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
                                    <li class="d-shop-cart"><a href="#"><i class="flaticon-shopping-cart"></i> <span class="cart-count">3</span></a>
                                        <ul class="minicart">
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="img/product/pro1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="img/product/pro2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-img">
                                                    <a href="product-details.html">
                                                        <img src="img/product/pro3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cart-content">
                                                    <h3>
                                                        <a href="product-details.html">Black & White Shoes</a>
                                                    </h3>
                                                    <div class="cart-price">
                                                        <span class="new">$ 229.9</span>
                                                        <span>
                                                            <del>$239.9</del>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="del-icon">
                                                    <a href="#">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">Total:</span>
                                                    <span class="f-right">$300.0</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkout-link">
                                                    <a href="cart.html">Shopping Cart</a>
                                                    <a class="red-color" href="checkout.html">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
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

		<!-- JS here -->
        <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
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
