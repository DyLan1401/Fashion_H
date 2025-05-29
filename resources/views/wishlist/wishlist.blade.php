{{-- filepath: resources/views/products/wishlist.blade.php --}}
@extends('layouts.app')

@section('content')
<h2 style="text-align:center">❤️ Danh sách sản phẩm yêu thích</h2>
<div class="product-list" style="display:flex;flex-wrap:wrap;gap:20px;justify-content:center;">
    @forelse($products as $product)
    <div class="product-card" style="border:1px solid #ddd;border-radius:10px;padding:20px;width:250px;text-align:center;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width:100%;height:auto;margin-bottom:10px;">
        <h4>{{ $product->name }}</h4>
        <p>Giá: {{ number_format($product->price, 0, ',', '.') }}₫</p>
    </div>
    @empty
    <p>Không có sản phẩm nào trong danh sách yêu thích.</p>
    @endforelse
</div>
@endsection