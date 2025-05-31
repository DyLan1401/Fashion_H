@extends('user.layouts.app')

@section('content')
<main>
    <div class="checkout-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-details">
                        <h3 class="billing-title">Thông tin thanh toán</h3>
                        <form action="{{ route('user.cart.placeOrder') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Tên</label>
                                        <input type="text" name="first_name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Họ</label>
                                        <input type="text" name="last_name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Thành phố</label>
                                        <input type="text" name="city" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Mã bưu chính</label>
                                        <input type="text" name="postcode" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" name="email" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment mt-20">
                                <button type="submit" class="btn theme-btn">Đặt hàng</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $item->products->product_name }} <strong class="product-quantity"> × {{ $item->quantity }}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{ number_format($item->quantity * $item->products->price) }} VNĐ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>Tổng cộng</th>
                                        <td><strong><span class="amount">{{ number_format($total) }} VNĐ</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="payment-method">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" data-parent="#payment-method" href="#method1">Thanh toán khi nhận hàng</a>
                                            </h4>
                                        </div>
                                        <div id="method1" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                Vui lòng thanh toán bằng tiền mặt khi nhận hàng của bạn.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" data-parent="#payment-method" href="#method2">Chuyển khoản ngân hàng</a>
                                            </h4>
                                        </div>
                                        <div id="method2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến khi tiền đã được xóa trong tài khoản của chúng tôi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection 