<!DOCTYPE html>
<html>
<head>
    <title>Fashion H</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Fashion H</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Trang chủ</a>
                </li>
                
                <!-- Sản phẩm Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item" href="{{ route('signout') }}">Sản phẩm nam</a></li>
                        <li><a class="dropdown-item" href="">Sản phẩm nữ</a></li>
                        <li><a class="dropdown-item" href="">Sản phẩm giảm giá</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.form') }}">Liên hệ</a>
                </li>
            </ul>

            <!-- Search Form -->
            <form class="d-flex me-3" action="" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
            </form>

            <!-- Tài khoản Dropdown -->
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tài khoản
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.createUser') }}">Đăng ký</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="">Đơn hàng của tôi</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('signout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item" >Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav> 

@yield('content')

<footer class="bg-dark text-white mt-5 pt-4 pb-2 fixed-bottom" style="z-index: 1030;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <p class="mb-0"><strong>Trường Cao đẳng Công nghệ Thủ Đức</strong></p>
                <p class="mb-0">Địa chỉ: 53 Võ Văn Ngân, Linh Chiểu, Thủ Đức, TP.HCM</p>
            </div>
            <div class="col-md-5">
                <div style="width: 100%">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.712013412019!2d106.771593315334!3d10.830685992287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175271e2e2e2e2e%3A0x8d0b1b1b1b1b1b1b!2zQ8O0bmcgVGjhu6cgQ8O0bmcgTmdo4buHIFRo4buneSBUaHXhuq1uIMSQ4buT!5e0!3m2!1svi!2s!4v1684488888888!5m2!1svi!2s"
                        width="100%" height="140" style="border:0; border-radius:8px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>