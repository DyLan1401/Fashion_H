@extends('user.layouts.app')

@section('content')
<main>
    <div class="checkout-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="order-details-content">
                        <h3 class="order-details-title">Chi tiết đơn hàng của bạn</h3>
                        <div class="order-summary-box">
                            <p><strong>Mã đơn hàng:</strong> {{ $order->order_id }}</p>
                            <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
                            <p><strong>Tổng số tiền:</strong> {{ number_format($order->total_amount) }} VNĐ</p>
                            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                            <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
                            <p><strong>Email:</strong> {{ $order->email }}</p>
                            <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                            @if($order->note)
                                <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
                            @endif
                        </div>

                        <h4 class="order-items-title">Sản phẩm trong đơn hàng</h4>
                        <div class="order-items-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->unit_price) }} VNĐ</td>
                                        <td>{{ number_format($item->quantity * $item->unit_price) }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('user.cart.index') }}" class="btn theme-btn">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection 