@extends('dashboard')

@section('content')
<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        background: #f9f9f9;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
    }
    .form-group input, .form-group textarea, .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-container button {
        width: 100%;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
    }
</style>
<div class="form-container">
<h1 class="text-2xl font-bold mb-4">Tạo bài viết</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label class="block mb-2">Tiêu đề:</label>
    <input name="tieu_de" class="border w-full p-2 mb-4" required> <br>

    <label class="block mb-2">Nội dung:</label>
    <textarea name="noi_dung" class="border w-full p-2 mb-4" required></textarea> <br>

    <label class="block mb-2">Ảnh đại diện (URL):</label>
    <input name="anh_dai_dien" class="border w-full p-2 mb-4"> <br>

    <label class="block mb-2">Trạng thái:</label>
    <select name="trang_thai" class="border w-full p-2 mb-4"> <br>
        <option value="draft">Nháp</option>
        <option value="published">Công khai</option>
        <option value="archived">Lưu trữ</option> <br>
    </select>

    <button class="bg-green-500 text-white px-4 py-2 rounded" type="submit">Lưu</button>
</form>
</div>
@endsection