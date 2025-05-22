@extends('layouts.main')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="container">
        <h2>Đơn hàng của {{ $user->name }}</h2>

        @if ($user->orders->isEmpty())
            <p>Người dùng này chưa có đơn hàng nào.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->orders as $order)
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ number_format($order->total, 2) }} VNĐ</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection
