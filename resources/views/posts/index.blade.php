@extends('dashboard')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Danh sách bài viết</h1>

        @if (session('success'))
            <div style="color: green;" class="mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="inline-block mb-4 bg-blue-500 text-white px-4 py-2 rounded">+ Thêm bài viết</a>

        <table class="w-full border" cellpadding="10" cellspacing="0">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Tiêu đề</th>
                    <th class="p-2 border">Nội dung</th>
                    <th class ="p-2 border">Anh dai dien</th>
                    <th class="p-2 border">Trạng thái</th>
                    <th class="p-2 border">Ngày tạo</th>
                    <th class="p-2 border">Tác giả</th>
                    <th class="p-2 border">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td class="border p-2">{{ $post->id }}</td>
                        <td class="border p-2">{{ $post->tieu_de }}</td>
                        <td class="border p-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->noi_dung), 80) }}
                        </td>
                        <td class="border p-2">{{ $post->anh_dai_dien }}</td>
                        <td class="border p-2">{{ $post->trang_thai }}</td>
                        <td class="border p-2">{{ $post->ngay_tao }}</td>
                        <td class="border p-2">{{ $post->ma_tac_gia }}</td>
                        <td class="border p-2">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600">Xem</a> |
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-600">Sửa</a> |
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600" type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-2 border text-center" colspan="7">Không có bài viết nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
