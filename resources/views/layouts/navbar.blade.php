<!DOCTYPE html>
<html>
<head>
    <title>Fashion H</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    @if(file_exists(public_path('css/styles.css')))
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @endif
    @if(file_exists(public_path('js/scripts.js')))
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}" defer></script>
    @endif

</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5 bg-info">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- Phần giữa -->
            
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SHOP</a>
                </li>

                <!-- Sản phẩm Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUCTS
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                    <li class="nav-item">
                    <a class="nav-link" href="">Thời Trang Nam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Thời Trang nữ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Khuyến Mãi</a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signout') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('contact.form') }}>Liên Hệ</a>
                </li>
            </ul>
            <!-- Phần bên phải -->
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item me-2">
                    <form action="{{ route('signout') }}" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tài khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.createUser') }}">Đăng kí</a></li>
                        @else

                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="{{ route('signout') }}">Thoát</a></li>
                        @endguest
                    </ul>
              
            </ul>

            
        </div>
    </div>
</nav>

    @yield('content')



</body>

</html>