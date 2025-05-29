@extends('dashboard')

@section('content')
    <h1>Danh sách bài viết</h1>
    <a href="{{ route('posts.create') }}">Tạo bài viết mới</a>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Mã bài viết</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Tiêu đề</th>
                 <th style="border: 1px solid #ddd; padding: 8px;">Anh dai dien</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Tác giả</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Trạng thái</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $post->ma_bai_viet }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $post->tieu_de }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
    @if($post->anh_dai_dien)
        <img src="{{ $post->anh_dai_dien }}" alt="Ảnh" style="max-width: 50px; max-height: 50px;">
    @else
        Không có ảnh
    @endif
</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $post->tacGia->name ?? 'Không có' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $post->trang_thai_bai_viet }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('posts.show', $post->ma_bai_viet) }}" style="padding: 5px 10px; background-color: #4CAF50; color: white; text-decoration: none; margin-right: 5px;">Xem</a>
                        <a href="{{ route('posts.edit', $post->ma_bai_viet) }}" style="padding: 5px 10px; background-color: #2196F3; color: white; text-decoration: none; margin-right: 5px;">Sửa</a>
                        <form action="{{ route('posts.destroy', $post->ma_bai_viet) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 5px 10px; background-color: #f44336; color: white; border: none; cursor: pointer;" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection