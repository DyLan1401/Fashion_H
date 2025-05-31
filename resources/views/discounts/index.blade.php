@extends('dashboard')

@section('content')
    <h1>Danh sách mã giảm giá</h1>

    @if (session('thong_bao'))
        <div class="alert alert-success">{{ session('thong_bao') }}</div>
    @endif

    <a href="{{ route('discounts.create') }}" class="btn btn-primary mb-3">+ Thêm mã giảm giá</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Giảm (%)</th>
                <th>Loại</th>
                <th>Đơn hàng tối thiểu</th>
                <th>Số lần dùng</th>
                <th>Hết hạn</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $giamgia)
                <tr>
                    <td>{{ $giamgia->ma_giam_gia }}</td>
                    <td>{{ $giamgia->phan_tram_giam_gia }}</td>
                    <td>{{ $giamgia->loai_giam_gia }}</td>
                    <td>{{ $giamgia->gia_tri_don_hang_toi_thieu }}</td>
                    <td>{{ $giamgia->so_lan_su_dung_toi_da }}</td>
                    <td>{{ \Carbon\Carbon::parse($giamgia->ngay_het_han_giam_gia)->format('d/m/Y H:i') }}</td>

                    <td>
                        <a href="{{ route('discounts.show', $giamgia->ma_giam_gia) }}" class="btn btn-warning btn-sm">xem</a>
                        <a href="{{ route('discounts.edit', $giamgia->ma_giam_gia) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('discounts.destroy', $giamgia->ma_giam_gia) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
