<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Admin | Quản lý sản phẩm</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark">
            <div class="sidebar-header d-flex justify-content-between align-items-center p-3">
                <h4 class="text-white mb-0">Fashion Admin</h4>
                <button class="btn btn-sm btn-outline-light d-lg-none sidebar-toggle">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <ul class="nav flex-column px-2">
                <li class="nav-item">
                    <a class="nav-link dashboard-link" href="index.html">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Bảng điều khiển
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link products-link" href="product.html">
                        <i class="fas fa-tshirt me-2"></i>
                        Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link customers-link" href="customers.html">
                        <i class="fas fa-users me-2"></i>
                        Khách hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link orders-link" href="orders.html">
                        <i class="fas fa-shopping-cart me-2"></i>
                        Đơn hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link promotions-link" href="promotions.html">
                        <i class="fas fa-percent me-2"></i>
                        Khuyến mãi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link reviews-link" href="reviews.html">
                        <i class="fas fa-star me-2"></i>
                        Đánh giá
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link reports-link" href="/reports.html">
                        <i class="fas fa-chart-bar me-2"></i>
                        Báo cáo
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>