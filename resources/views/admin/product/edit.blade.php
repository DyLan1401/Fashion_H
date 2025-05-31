@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa sản phẩm</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="productName" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
                               id="productName" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="productCategory" class="form-label">Danh mục</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="productCategory" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="productPrice" class="form-label">Giá bán</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                   id="productPrice" name="price" value="{{ old('price', $product->price) }}" required>
                            <span class="input-group-text">đ</span>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="productStock" class="form-label">Số lượng</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                               id="productStock" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="productType" class="form-label">Loại sản phẩm</label>
                        <select class="form-select @error('type_id') is-invalid @enderror" 
                                id="productType" name="type_id" required>
                            <option value="">Chọn loại</option>
                            @foreach($productTypes as $type)
                                <option value="{{ $type->id }}" 
                                    {{ old('type_id', $product->type_id) == $type->id ? 'selected' : '' }}>
                                    {{ $type->type_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="productColor" class="form-label">Màu sắc</label>
                        <select class="form-select @error('color') is-invalid @enderror" 
                                id="productColor" name="color" required>
                            <option value="">Chọn màu</option>
                            @php
                                $colors = ['Blue' => 'Xanh dương', 'Green' => 'Xanh lá', 'Orange' => 'Cam', 
                                         'Navy' => 'Xanh navy', 'Pinkish' => 'Hồng', 'Vista' => 'Vista'];
                            @endphp
                            @foreach($colors as $value => $label)
                                <option value="{{ $value }}" 
                                    {{ old('color', $product->color) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="productSize" class="form-label">Kích thước</label>
                        <select class="form-select @error('size') is-invalid @enderror" 
                                id="productSize" name="size" required>
                            <option value="">Chọn kích thước</option>
                            @php
                                $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                            @endphp
                            @foreach($sizes as $size)
                                <option value="{{ $size }}" 
                                    {{ old('size', $product->size) == $size ? 'selected' : '' }}>
                                    {{ $size }}
                                </option>
                            @endforeach
                        </select>
                        @error('size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="productDescription" class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control @error('product_description') is-invalid @enderror" 
                              id="productDescription" name="product_description" rows="3" required>{{ old('product_description', $product->product_description) }}</textarea>
                    @error('product_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="productImage" class="form-label">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control @error('product_image') is-invalid @enderror" 
                           id="productImage" name="product_image">
                    @error('product_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($product->product_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $product->product_image) }}" 
                                 alt="Current product image" 
                                 class="img-thumbnail" 
                                 style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 