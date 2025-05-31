<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết - Fashion_H</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 60px;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Fashion_H</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Đăng ký</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container mt-4">
        <h1>Chi tiết bài viết</h1>

        <!-- Thông báo -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <p><strong>Mã bài viết:</strong> {{ $post->ma_bai_viet }}</p>
                <p><strong>Tiêu đề:</strong> {{ $post->tieu_de }}</p>
                <p><strong>Nội dung:</strong> {{ $post->noi_dung }}</p>
                <p><strong>Ảnh đại diện:</strong>
                    @if ($post->anh_dai_dien)
                        <img src="{{ asset('storage/' . $post->anh_dai_dien) }}" alt="Ảnh đại diện" width="200" class="img-fluid">
                    @else
                        Không có ảnh
                    @endif
                </p>
                <p><strong>Tác giả:</strong> {{ $post->user ? $post->user->name : 'Không xác định' }}</p>
                <p><strong>Trạng thái:</strong> {{ $post->trang_thai_bai_viet }}</p>
                <p><strong>Ngày tạo:</strong>
                    @if ($post->ngay_tao instanceof \Carbon\Carbon)
                        {{ $post->ngay_tao->format('Y-m-d H:i:s') }}
                    @else
                        {{ \Carbon\Carbon::parse($post->ngay_tao ?? now())->format('Y-m-d H:i:s') }}
                    @endif
                </p>
                <!-- Không cần "Ngày cập nhật" vì không có updated_at -->
            </div>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>