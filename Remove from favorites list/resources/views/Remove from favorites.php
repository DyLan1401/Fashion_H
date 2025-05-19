@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Xóa khỏi danh sách yêu thích</h1>
    <form action="{{ route('remove_favorites.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Tên người dùng</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required value="{{ old('user_name') }}">
            @error('user_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required value="{{ old('product_name') }}">
            @error('product_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Xóa</button>
    </form>
</div>
@endsection