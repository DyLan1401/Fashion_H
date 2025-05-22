@extends('dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">Chỉnh sửa bài viết</h1>
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label class="block mb-2">Tiêu đề:</label>
    <input name="tieu_de" value="{{ $post->tieu_de }}" class="border w-full p-2 mb-4" required>

    <label class="block mb-2">Nội dung:</label>
    <textarea name="noi_dung" class="border w-full p-2 mb-4" required>{{ $post->noi_dung }}</textarea>

    <label class="block mb-2">Ảnh đại diện (URL):</label>
    <input name="anh_dai_dien" value="{{ $post->anh_dai_dien }}" class="border w-full p-2 mb-4">

    <label class="block mb-2">Trạng thái:</label>
    <select name="trang_thai" class="border w-full p-2 mb-4">
        <option value="draft" {{ $post->trang_thai == 'draft' ? 'selected' : '' }}>Nháp</option>
        <option value="published" {{ $post->trang_thai == 'published' ? 'selected' : '' }}>Công khai</option>
        <option value="archived" {{ $post->trang_thai == 'archived' ? 'selected' : '' }}>Lưu trữ</option>
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Cập nhật</button>
</form>
@endsection