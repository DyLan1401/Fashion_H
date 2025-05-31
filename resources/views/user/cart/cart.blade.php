@extends('layouts.navbar');

@section('content')

<main>

    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1>Shoping Cart</h1>
                        <ul class="breadcrumb-menu">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- Cart Area Strat-->
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user.cart.updateQuantity') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="{{ $item->products->product_image ? asset('storage/' . $item->products->product_image) : asset('img/product/image.png') }}"
                                                    alt="{{ $item->products->product_name }}"
                                                    onerror="this.onerror=null; this.src='{{ asset(`img/product/image.png`) }}';"
                                                    style="object-fit: cover;">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="#">{{ $item->products->product_name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ $item->products->price }}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ $item->products->price * $item->quantity }}</span>
                                        </td>
                                        <td class="product-remove">
                                            <form action="{{ route('user.cart.remove', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0" onclick="return confirm('Bạn muốn xóa sản phẩm ra khỏi giỏ hàng không?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-md-5 ">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Total <span>{{ $total }}</span></li>
                                </ul>
                                <a class="btn theme-btn" href="{{ route('user.cart.checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Area End-->


</main>

@endsection