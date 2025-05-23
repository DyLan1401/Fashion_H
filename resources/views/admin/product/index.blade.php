@extends('admin.layouts.app');

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý sản phẩm thời trang</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Xuất báo cáo
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Products Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products->total() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Count Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Danh mục</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products->first()->Category->count() ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Listing -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-dark">Danh sách sản phẩm</h6>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus me-1"></i> Thêm sản phẩm
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="productTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Loại</th>
                            <th>Giá</th>
                            <th>Tồn kho</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $product->product_image) }}" 
                                     alt="{{ $product->product_name }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 50px;">
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->Category->category_name }}</td>
                            <td>{{ $product->Type->type_name }}</td>
                            <td>{{ number_format($product->price) }}đ</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                @if($product->quantity > 10)
                                    <span class="badge bg-success">Còn hàng</span>
                                @elseif($product->quantity > 0)
                                    <span class="badge bg-warning">Sắp hết</span>
                                @else
                                    <span class="badge bg-danger">Hết hàng</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm mới</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="productCategory" class="form-label">Danh mục</label>
                            <select class="form-select" id="productCategory" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="productPrice" class="form-label">Giá bán</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="productPrice" name="price" required>
                                <span class="input-group-text">đ</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="productStock" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="productStock" name="quantity" required>
                        </div>
                        <div class="col-md-4">
                            <label for="productType" class="form-label">Loại sản phẩm</label>
                            <select class="form-select" id="productType" name="type_id" required>
                                <option value="">Chọn loại</option>
                                @foreach($productTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productColor" class="form-label">Màu sắc</label>
                            <select class="form-select" id="productColor" name="color" required>
                                <option value="">Chọn màu</option>
                                <option value="Blue">Xanh dương</option>
                                <option value="Green">Xanh lá</option>
                                <option value="Orange">Cam</option>
                                <option value="Navy">Xanh navy</option>
                                <option value="Pinkish">Hồng</option>
                                <option value="Vista">Vista</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="productSize" class="form-label">Kích thước</label>
                            <select class="form-select" id="productSize" name="size" required>
                                <option value="">Chọn kích thước</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" id="productDescription" name="product_description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="productImages" class="form-label">Hình ảnh sản phẩm</label>
                        <input class="form-control" type="file" id="productImages" name="product_image" required>
                        <div class="form-text">Có thể tải lên nhiều hình ảnh</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" form="productForm" class="btn btn-dark">Lưu sản phẩm</button>
            </div>
        </div>
    </div>
</div>
@endsection