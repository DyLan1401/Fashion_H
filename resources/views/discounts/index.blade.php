@extends('dashboard')

@section('content')
    <h1>Danh Sách Mã Giảm Giá</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('discounts.create') }}" class="btn btn-success mb-3">Tạo Mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Phần Trăm Giảm Giá</th>
                <th>Loại Giảm Giá</th>
                <th>Giá Trị Đơn Hàng Tối Thiểu</th>
                <th>Số Lần Sử Dụng Tối Đa</th>
                <th>Số Lần Đã Sử Dụng</th>
                <th>Ngày Hết Hạn</th>
                <th>Ngày Tạo</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
                <tr>
                    <td>{{ $discount->id }}</td>
                    <td>{{ $discount->phan_tram_giam_gia }}</td>
                    <td>{{ $discount->loai_giam_gia }}</td>
                    <td>{{ $discount->gia_tri_don_hang_toi_thieu ?? 'N/A' }}</td>
                    <td>{{ $discount->so_lan_su_dung_toi_da ?? 'N/A' }}</td>
                    <td>{{ $discount->so_lan_da_su_dung }}</td>
                    <td>{{ $discount->ngay_het_han_giam_gia }}</td>
                    <td>{{ $discount->ngay_tao }}</td>
                    <td>
                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection