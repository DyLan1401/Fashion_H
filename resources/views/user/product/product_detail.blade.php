@extends('user.layouts.app');

@section('content')
<main>

    <!-- breadcrumb-area-start -->
    <section class="breadcrumb-area" data-background="img/bg/page-title.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1>Our Shop</h1>
                        <ul class="breadcrumb-menu">
                            <li><a href="index.html">home</a></li>
                            <li><span>shop details</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area start -->
    <section class="shop-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4">
                    <div class="product-details-img mb-10">
                        <div class="tab-content" id="myTabContentpro">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="{{ 
                                                        $product->product_image
                                                        ? asset('storage/' . $product->product_image)
                                                        : asset('img/product/image.png') 
                                                    }}"
                                                    alt="{{ $product->product_name }}"
                                                    onerror="this.onerror=null; this.src='{{ asset(`img/product/image.png`) }}';">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="product-details mb-30 pl-30">
                        <div class="details-cat mb-20">
                            <a href="#">{{ $product->category->category_name }}, </a>
                            <a href="#">{{ $product->type->type_name }}</a>
                        </div>
                        <h2 class="pro-details-title mb-15">{{ $product->product_name }}</h2>
                        <div class="details-price mb-20">
                            <span>{{ $product->price }}</span>
                            <!-- <span class="old-price">$246.00</span> -->
                        </div>
                        <div class="product-variant">


                            <div class="product-desc variant-item">
                                <p>{{ $product->product_description }}</p>
                            </div>

                            <div class="product-info-list variant-item">
                                <ul>
                                    <li><span>Product Code:</span> {{ $product->id }}</li>
                                    <li><span>Stock:</span> <span class="in-stock">{{ $product->quantity }}</span></li>
                                </ul>
                            </div>

                            <div class="product-action-details variant-item">
                                <div class="product-details-action">
                                    <form action="#">
                                        <div class="plus-minus">
                                            <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                        </div>
                                        <button class="details-action-icon" type="submit"><i class="fas fa-heart"></i></button>
                                        <button class="details-action-icon" type="submit"><i class="fas fa-hourglass"></i></button>
                                        <div class="details-cart mt-40">
                                            <button class="btn theme-btn">purchase now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-xl-8 col-lg-8">
                    <div class="product-review">
                        <ul class="nav review-tab" id="myTabproduct" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home"
                                    aria-selected="true">Description </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile"
                                    aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                                <div class="desc-text">
                                    <p>{{ $product->product_description }}</p>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                                <div class="desc-text review-text">
                                    <div class="product-commnets">
                                        <div class="product-commnets-list mb-25 pb-15">
                                            <div class="pro-comments-img">
                                                <img src="img/product/comments/01.png" alt="">
                                            </div>
                                            <div class="pro-commnets-text">
                                                <h4>Roger West -
                                                    <span>June 5, 2018</span>
                                                </h4>
                                                <div class="pro-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt
                                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation.</p>
                                            </div>
                                        </div>
                                        <div class="product-commnets-list mb-25 pb-15">
                                            <div class="pro-comments-img">
                                                <img src="img/product/comments/02.png" alt="">
                                            </div>
                                            <div class="pro-commnets-text">
                                                <h4>Roger West -
                                                    <span>June 5, 2018</span>
                                                </h4>
                                                <div class="pro-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt
                                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-box mt-50">
                                        <h4>Add a Review</h4>
                                        <div class="your-rating mb-40">
                                            <span>Your Rating:</span>
                                            <div class="rating-list">
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="far fa-star"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <form class="review-form" action="#">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label for="message">YOUR REVIEW</label>
                                                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="r-name">Name</label>
                                                    <input type="text" id="r-name">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="r-email">Email</label>
                                                    <input type="email" id="r-email">
                                                </div>
                                                <div class="col-xl-12">
                                                    <button class="btn theme-btn">Add your Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="pro-details-banner">
                        <a href="shop.html"><img src="img/banner/pro-details.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area end -->

</main>
@endsection