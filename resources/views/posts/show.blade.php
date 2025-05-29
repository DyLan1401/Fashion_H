@extends('dashboard')

@section('content')
    <h1>Chi tiết bài viết</h1>

    <div style="margin-bottom: 20px;">
        <h2>{{ $post->tieu_de }}</h2>
        <p><strong>Nội dung:</strong> {{ $post->noi_dung }}</p>
       <p><strong>Ảnh đại diện:</strong>
    @if($post->anh_dai_dien)
        <img src="{{ $post->anh_dai_dien }}" alt="Ảnh đại diện" style="max-width: 200px; max-height: 200px;">
    @else
        Không có ảnh
    @endif
</p>
        <p><strong>Trạng thái:</strong> 
            @if($post->trang_thai_bai_viet == 'draft')
                Nháp
            @elseif($post->trang_thai_bai_viet == 'published')
                Đã đăng
            @else
                Lưu trữ
            @endif
        </p>
        <p><strong>Tác giả:</strong> {{ $post->tacGia->name ?? 'Không có' }}</p>
        <p><strong>Ngày tạo:</strong> {{ $post->ngay_tao }}</p>
    </div>

    <div>
        <a href="{{ route('posts.index') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none;">Quay lại danh sách</a>
        <a href="{{ route('posts.edit', $post->ma_bai_viet) }}" style="padding: 10px 20px; background-color: #2196F3; color: white; text-decoration: none;">Sửa bài viết</a>
    </div>
@endsection