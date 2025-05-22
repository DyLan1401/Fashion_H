@extends('dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lịch sử mua hàng</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Người mua</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Ngày mua</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $history->user_name }}</td>
                    <td>{{ $history->product_name }}</td>
                    <td>{{ $history->quantity }}</td>
                    <td>{{ number_format($history->total_price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $history->purchase_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection