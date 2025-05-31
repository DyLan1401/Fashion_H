@extends('dashboard')

@section('content')
    <h1>Chỉnh sửa mã giảm giá</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('discounts.update', $giamgia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ma_giam_gia" class="form-label">Mã giảm giá</label>
            <input type="text" name="ma_giam_gia" class="form-control" value="{{ $giamgia->ma_giam_gia }}" required>
        </div>
        <div class="mb-3">
            <label for="phan_tram_giam_gia" class="form-label">Phần trăm giảm giá</label>
            <input type="number" step="0.01" name="phan_tram_giam_gia" class="form-control" value="{{ $giamgia->phan_tram_giam_gia }}" required>
        </div>
        <div class="mb-3">
            <label for="loai_giam_gia" class="form-label">Loại</label>
            <select name="loai_giam_gia" class="form-control" required>
                <option value="percentage" {{ $giamgia->loai_giam_gia == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                <option value="fixed" {{ $giamgia->loai_giam_gia == 'fixed' ? 'selected' : '' }}>Cố định</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gia_tri_don_hang_toi_thieu" class="form-label">Giá trị đơn hàng tối thiểu</label>
            <input type="number" step="0.01" name="gia_tri_don_hang_toi_thieu" class="form-control" value="{{ $giamgia->gia_tri_don_hang_toi_thieu }}">
        </div>
        <div class="mb-3">
            <label for="so_lan_su_dung_toi_da" class="form-label">Số lần sử dụng tối đa</label>
            <input type="number" name="so_lan_su_dung_toi_da" class="form-control" value="{{ $giamgia->so_lan_su_dung_toi_da }}">
        </div>
        <div class="mb-3">
            <label for="ngay_het_han_giam_gia" class="form-label">Ngày hết hạn</label>
            <input type="datetime-local" name="ngay_het_han_giam_gia" class="form-control"
                value="{{ \Carbon\Carbon::parse($giamgia->ngay_het_han_giam_gia)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('discounts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection
