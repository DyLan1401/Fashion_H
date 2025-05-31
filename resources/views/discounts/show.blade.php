@extends('dashboard')

@section('content')
    <h1>Chi tiết mã giảm giá</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Mã giảm giá:</strong> {{ $giamgia->ma_giam_gia }}</p>
            <p><strong>Phần trăm giảm giá:</strong> {{ $giamgia->phan_tram_giam_gia }}%</p>
            <p><strong>Loại giảm giá:</strong> {{ $giamgia->loai_giam_gia == 'percentage' ? 'Phần trăm' : 'Cố định' }}</p>
            <p><strong>Giá trị đơn hàng tối thiểu:</strong> {{ number_format($giamgia->gia_tri_don_hang_toi_thieu, 0, ',', '.') }}đ</p>
            <p><strong>Số lần sử dụng tối đa:</strong> {{ $giamgia->so_lan_su_dung_toi_da }}</p>
            <p><strong>Ngày hết hạn:</strong> {{ \Carbon\Carbon::parse($giamgia->ngay_het_han_giam_gia)->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('discounts.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
@endsection
