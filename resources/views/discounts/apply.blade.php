@extends('dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4">Áp mã giảm giá</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }} <br>
            Số tiền giảm: <strong>{{ number_format(session('discount')) }}đ</strong> <br>
            Tổng sau giảm: <strong>{{ number_format(session('total_after_discount')) }}đ</strong>
        </div>
    @endif

    <form method="POST" action="{{ route('discounts.apply') }}">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Nhập mã giảm giá (ID)</label>
            <input type="text" class="form-control" name="code" id="code" required>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Tổng đơn hàng</label>
            <input type="number" step="0.01" class="form-control" name="total" id="total" required>
        </div>
        <button type="submit" class="btn btn-primary">Áp dụng</button>
    </form>
</div>
@endsection
