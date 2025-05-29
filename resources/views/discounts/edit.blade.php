
@extends('dashboard')

@section('content')
    <h1>Chỉnh Sửa Mã Giảm Giá</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('discounts.edit', $discount->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="phan_tram_giam_gia">Phần Trăm Giảm Giá</label>
            <input type="number" step="0.01" name="phan_tram_giam_gia" class="form-control" value="{{ $discount->phan_tram_giam_gia }}" required>
        </div>
        <div class="form-group">
            <label for="loai_giam_gia">Loại Giảm Giá</label>
            <select name="loai_giam_gia" class="form-control" disabled>
                <option value="percentage" {{ $discount->loai_giam_gia == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gia_tri_don_hang_toi_thieu">Giá Trị Đơn Hàng Tối Thiểu</label>
            <input type="number" step="0.01" name="gia_tri_don_hang_toi_thieu" class="form-control" value="{{ $discount->gia_tri_don_hang_toi_thieu ?? '' }}">
        </div>
        <div class="form-group">
            <label for="so_lan_su_dung_toi_da">Số Lần Sử Dụng Tối Đa</label>
            <input type="number" name="so_lan_su_dung_toi_da" class="form-control" value="{{ $discount->so_lan_su_dung_toi_da ?? '' }}">
        </div>
        <div class="form-group">
            <label for="ngay_het_han_giam_gia">Ngày Hết Hạn Giảm Giá</label>
            <input type="datetime-local" name="ngay_het_han_giam_gia" class="form-control" value="{{ \Carbon\Carbon::parse($discount->ngay_het_han_giam_gia)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection