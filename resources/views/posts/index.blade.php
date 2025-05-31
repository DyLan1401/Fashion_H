<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết - Fashion_H</title>
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
        <h1>Danh sách bài viết</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tạo bài viết mới</a>

        <!-- Thông báo -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã bài viết</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh đại diện</th>
                    <th>Tác giả</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->ma_bai_viet }}</td>
                        <td>{{ $post->tieu_de }}</td>
                        <td>
                            @if ($post->anh_dai_dien)
                                <img src="{{ asset('storage/' . $post->anh_dai_dien) }}" alt="Ảnh đại diện" class="post-image">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>{{ $post->user ? $post->user->name : 'abc' }}</td>
                        <td>{{ $post->trang_thai_bai_viet }}</td>
                        <td>
                            @if ($post->ngay_tao instanceof \Carbon\Carbon)
                                {{ $post->ngay_tao->format('Y-m-d H:i:s') }}
                            @else
                                {{ \Carbon\Carbon::parse($post->ngay_tao ?? now())->format('Y-m-d H:i:s') }}
                            @endif
                        </td>
                        </td>
                        <!-- <td>N/A</td> Không có updated_at, hiển thị N/A -->
                        <td>
                            <a href="{{ route('posts.show', $post->ma_bai_viet) }}" class="btn btn-success btn-sm">Xem</a>
                            <a href="{{ route('posts.edit', $post->ma_bai_viet) }}" class="btn btn-info btn-sm">Sửa</a>
                            <form action="{{ route('posts.destroy', $post->ma_bai_viet) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>