@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Trang chủ</h1>
    <h2>Sản phẩm</h2>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }} VNĐ</li>
        @endforeach
    </ul>
    <h2>Bài viết</h2>
    <ul>
        @foreach($posts as $post)
            <li><strong>{{ $post->title }}</strong>: {{ $post->content }}</li>
        @endforeach
    </ul>
    <h2>Danh mục</h2>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</div>
@endsection