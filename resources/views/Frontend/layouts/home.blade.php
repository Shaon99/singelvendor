@extends('Frontend.layouts.master')
@section('content')
    @include('Frontend.layouts.slider')
    @include('Frontend.layouts.service_area')

    <style>
        .center {
            margin: auto;
            text-align: center;
        }


        }

    </style>

    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/owl-carousel/owl.carousel.css">

    <!-- Offered/flash deal products -->
    @if ($products->isNotEmpty())
        <div class="product-area pb-110">
            <div class="container">
                <!-- flash deal header -->
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-deal-wrap">
                        <div class="section-title-3">
                            <h2>Offered Products</h2>
                        </div>
                    </div>
                    <div class="btn-style-7">
                        <a href="{{ route('offerProducts') }}">All Offered Products</a>
                    </div>
                </div>
                <!-- flash deal header  end-->

                <!-- flash deal products start-->
                <div class="product-slider-active-4 nav-style-3">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div style="" class="product-plr-1">
                                <div class="single-product-wrap shadow mb-4 mt-4 rounded">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{ route('product.details', $product->id) }}">
                                            <img class="center adjust-height"
                                                src="{{ "/upload/products_images/$product->image" }}" alt="Product Image"
                                                style=" width:210px; height:210px;">
                                        </a>
                                        <span
                                            class="pro-badge center left bg-red">{{ number_format((($product->price - $product->promo_price) * 100) / $product->price, 2, '.', ',') }}%
                                        </span>
                                        <div class="product-action-2 tooltip-style-2">
                                            <a href="{{ route('wishlist.add', $product->id) }}">
                                                <button data-id={{ $product->id }} class="addTowishlist"
                                                    title="Wishlist"><i class="icon-heart"></i></button>
                                            </a>
                                            <button class="q_m_btn" id="quickView_modal_btn"
                                                data-id={{ $product->id }} title="Quick View"><i
                                                    class="icon-size-fullscreen icons"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 center">
                                        <div class="product-content-categories">
                                            @if (isset($product->category))
                                                <a class="purple"
                                                    href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                            @endif
                                        </div>
                                        <h3><a class="purple"
                                                href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-rating-wrap-2">
                                            @if (ceil($product->avg_rating) > 0)
                                                <div class="product-rating-4 center">
                                                    @if (ceil($product->avg_rating) == 1)
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 2)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 3)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 4)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 5)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @endif

                                                    @if (count($product->reviews) > 0)
                                                        <span>({{ count($product->reviews) }})</span>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="center" style="color: gray">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>

                                                    <span>(0)</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-price-4 mb-3">
                                            <span class="new-price">{{ $product->promo_price }} Tk.</span>
                                            <span class="old-price">{{ $product->price }} Tk.</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-3 product-content-position-2 center">
                                        <div class="product-content-categories">
                                            @if (isset($product->category))
                                                <a class="purple"
                                                    href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                            @endif
                                        </div>
                                        <h3><a class="purple"
                                                href="{{ route('product.details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-rating-wrap-2">
                                            @if (ceil($product->avg_rating) > 0)
                                                <div class="product-rating-4 center">
                                                    @if (ceil($product->avg_rating) == 1)
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 2)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 3)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 4)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @elseif(ceil($product->avg_rating) == 5)
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    @endif

                                                    @if (count($product->reviews) > 0)
                                                        <span>({{ count($product->reviews) }})</span>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="center" style="color: gray">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>

                                                    <span>(0)</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-price-4 mb-3">
                                            <span class="new-price">{{ $product->promo_price }} Tk. </span>
                                            <span class="old-price">{{ $product->price }} Tk.</span>
                                        </div>
                                        <div class="pro-add-to-cart-2 mb-3">
                                            <a href="{{ route('product.details', ['id' => $product->id]) }}">
                                                @if ($product->stock > 0)
                                                    <button data-id={{ $product->id }} class="addToCart"
                                                        title="Add to Cart">Add To
                                                        Cart</button>
                                                @else
                                                    <button data-id={{ $product->id }} class="addToCart"
                                                        title="Out of Stock" disabled>Out of Stock</button>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- flash deal products end-->
            </div>
        </div>
    @endif
    <!-- Offered/flash deal products end-->


    <!-- Popular categories start -->

    {{-- static section banner --}}
    <div class="container-fluid">
        <div class="banner-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner banner-border">
                        <a href="{{ $advertise->button_link_1 }}">
                            <img style="height: 600px"
                                src="{{ asset('upload/advertise_images/' . $advertise->ad_image_1) }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white"><a
                                    href="{{ $advertise->button_link_1 }}">{{ $advertise->sub_heading_1 }}</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a
                                    href="{{ $advertise->button_link_1 }}">{{ $advertise->heading_1 }}</a></h3>
                            <!-- End .banner-title -->
                            <a href="{{ $advertise->button_link_1 }}"
                                class="btn btn-outline-primary-2 banner-link text-white">{{ $advertise->button_text_1 }}<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6-->

                <div class="col-md-6">
                    <div class="banner banner-border-hover">
                        <a href="{{ $advertise->button_link_2 }}">
                            <img style="height:290px"
                                src="{{ asset('upload/advertise_images/' . $advertise->ad_image_2) }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white"><a
                                    href="{{ $advertise->button_link_2 }}">{{ $advertise->sub_heading_2 }}</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a
                                    href="{{ $advertise->button_link_2 }}">{{ $advertise->heading_2 }}</a></h3>
                            <!-- End .banner-title -->
                            <a href="{{ $advertise->button_link_2 }}"
                                class="btn btn-outline-primary-2 banner-link">{{ $advertise->button_text_2 }}<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                    <div class="banner banner-border-hover">
                        <a href="{{ $advertise->button_link_3 }}">
                            <img style="height:290px"
                                src="{{ asset('upload/advertise_images/' . $advertise->ad_image_3) }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white"><a
                                    href="{{ $advertise->button_link_3 }}">{{ $advertise->sub_heading_3 }}</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a
                                    href="{{ $advertise->button_link_3 }}">{{ $advertise->sub_heading_3 }}</a></h3>
                            <!-- End .banner-title -->
                            <a href="{{ $advertise->button_link_3 }}"
                                class="btn btn-outline-primary-2 banner-link">{{ $advertise->button_text_3 }}<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .banner-group -->
    </div><!-- End .container -->

    {{-- static section banner end --}}

    {{-- Category product static --}}


    {{-- category product static end --}}

    <div class="container mb-5 mt-5">
        <div class="heading heading-center mb-3">
            <h2 class="title">Trendy Products</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                {{-- <li class="nav-item">
                <a class="nav-link" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="false">All</a>
            </li> --}}
                @foreach ($categories as $cat)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#trendy-tab-{{ $loop->iteration }}" role="tab"
                            aria-selected="false">{{ $cat->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            @foreach ($categories as $cat)
                <div class="tab-pane p-0 fade @if ($loop->first)
            show active
        @endif"
                    id="trendy-tab-{{ $loop->iteration }}" role="tabpanel">
                    <div class="owl-carousel owl-simple carousel-equal-height     carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true
                            }
                        }
                    }'>
                        @foreach ($cat->product as $product)
                            <div class="product product-2">
                                <figure style="height: 360px; background: #FFFFFF;" class="product-media">
                                    <a href="{{ route('product.details', $product->id) }}">
                                        <img src="{{ asset("upload/products_images/$product->image") }}"
                                            alt="Product image" class="product-image">
                                        @if ($product->sub_images->count() > 0)
                                            <img src="{{ asset('upload/products_images/sub_images/' . $product->sub_images()->first()->image) }}"
                                                alt="Product image" class="product-image-hover">
                                        @endif
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#">
                                            <button data-id={{ $product->id }} class="addTowishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></button>
                                        </a>
                                    </div>
                                    <div class="product-action product-action-transparent pro-add-to-cart-2">

                                        <a style="width:100%" href="{{ route('product.details', ['id' => $product->id]) }}">
                                            @if ($product->stock > 0)
                                                <button data-id={{ $product->id }}
                                                    class="addToCart btn btn-block btn-product btn-cart"
                                                    title="Add to Cart">Add To Cart</button>
                                            @else
                                                <button data-id={{ $product->id }}
                                                    class="addToCart btn btn-block btn-product btn-cart"
                                                    title="Out of Stock" disabled>Out of Stock</button>
                                            @endif
                                        </a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $cat->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h2 style="font-size: 1.8rem;font-weight:500" class="product-title"><a
                                            href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                    </h2><!-- End .product-title -->
                                    <div style="font-size:1.8rem" class="product-price">
                                        {{ $product->price }} Tk
                                    </div><!-- End .product-price -->


                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .owl-carousel -->

                </div><!-- .End .tab-pane -->
            @endforeach



        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="video-banner video-banner-bg bg-image text-center mb-4"
        style="background-image: url({{ asset('upload/video_bg/' . $video->video_bg_image) }})">
        <div class="container">
            <h3 class="video-banner-title h1 text-white">
                <span>{{ $video->sub_heading }}</span><strong>{{ $video->heading }}</strong></h3>
            <!-- End .video-banner-title -->
            <a href="{{ $video->video_link }}" class="btn-video btn-iframe"><i class="icon-play"></i></a>
        </div><!-- End .container -->
    </div><!-- End .video-banner bg-image -->

    <div class="pt-6 pb-6" style="background-color: #fff;">
        <div class="container-fluid">
            <div class="banner-set">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-set-content text-center">
                            <div class="set-content-wrapper">
                                <h4>Special</h4>
                                <h2>{{ $featured_area->heading }}</h2>

                                <p>{{ $featured_area->sub_heading }}</p>

                                <div class="banner-set-products">
                                    <div class="row">
                                        <div class="products">
                                            <div class="col-6">
                                                @php
                                                    $product_1 = \App\Model\product::find($featured_area->product_1);
                                                @endphp
                                                <div class="product product-2 text-center">
                                                    <figure style="width: 155px;height: 230px;background: #FFFFFF;"
                                                        class="product-media">
                                                        <a href="{{ route('product.details', $product_1->id) }}">
                                                            <img src="{{ asset("upload/products_images/$product_1->image") }}"
                                                                class="product-image">
                                                        </a>
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <h3 class="product-title"><a
                                                                href="{{ route('product.details', $product_1->id) }}">{{ $product_1->name }}</a>
                                                        </h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            {{ $product_1->price }} TK
                                                        </div><!-- End .product-price -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-6">
                                                @php
                                                    $product_2 = \App\Model\product::find($featured_area->product_2);
                                                @endphp
                                                <div class="product product-2 text-center">
                                                    <figure style="width: 155px;height: 230px;background: #FFFFFF;"
                                                        class="product-media">
                                                        <a href="{{ route('product.details', $product_2->id) }}">
                                                            <img src="{{ asset("upload/products_images/$product_2->image") }}"
                                                                class="product-image">
                                                        </a>
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">
                                                        <h3 class="product-title"><a
                                                                href="{{ route('product.details', $product_2->id) }}">{{ $product_2->name }}</a>
                                                        </h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            {{ $product_2->price }} TK
                                                        </div><!-- End .product-price -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 -->
                                        </div>
                                    </div><!-- End .row -->
                                </div><!-- End .banner-set-products -->
                            </div><!-- End .set-content-wrapper -->
                        </div><!-- End .banner-set-content -->
                    </div><!-- End .col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="banner-set-image banner-border-hover">
                            <a href="#">
                                <img src="assets/images/demos/demo-5/products/p-13.jfif" alt="banner">
                            </a>
                            <div class="banner-content">
                                <h3 class="banner-title"><a href="#"><span>Casual basics and<br>trendy key
                                            pieces.</span></a></h3><!-- End .banner-title -->
                                <h4 class="banner-subtitle">in this look</h4>
                                <!-- End .banner-subtitle -->
                                <h4 class="banner-detail">• Rib-knit cardigan <br>• Linen-blend paper bag trousers</h4>
                                <h4 class="banner-price">$19.99 - $48.00</h4>
                                <a href="#" class="btn btn-outline-primary-2 banner-link">buy all</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner-set-image -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .banner-set -->
        </div><!-- End .container -->
    </div><!-- End .bg-lighter pt6 pb-6 -->


    <div class="container pt-6 new-arrivals">
        <div class="heading heading-center mb-3">
            <h2 class="title">New Arrivals</h2><!-- End .title -->

            <ul class="nav nav-pills justify-content-center" role="tablist">
                @foreach ($categories as $cat)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#arrival-tab-{{ $loop->iteration }}" role="tab"
                            aria-selected="false">{{ $cat->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div><!-- End .heading -->

        <div class="tab-content">
            @foreach ($categories as $cat)
                <div class="tab-pane p-0 fade  @if ($loop->first)
            show active
        @endif"
                    id="arrival-tab-{{ $loop->iteration }}" role="tabpanel">
                    <div class="products">
                        <div class="row justify-content-center">
                            @foreach ($cat->product->take(8) as $product)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-2">
                                        <figure style="height: 360px; background: #FFFFFF;" class="product-media">
                                            <a href="{{ route('product.details', $product->id) }}">
                                                <img src="{{ asset("upload/products_images/$product->image") }}"
                                                    alt="Product image" class="product-image">
                                                @if ($product->sub_images->count() > 0)
                                                    <img src="{{ asset('upload/products_images/sub_images/' . $product->sub_images()->first()->image) }}"
                                                        alt="Product image" class="product-image-hover">
                                                @endif
                                            </a>

                                            <div class="product-action-vertical">
                                                {{-- <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a> --}}
                                                <a href="#">
                                                    <button data-id={{ $product->id }} class="addTowishlist"
                                                        title="Wishlist"><i class="icon-heart"></i></button>
                                                </a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action product-action-transparent pro-add-to-cart-2">
                                                <a style="width:100%"
                                                    href="{{ route('product.details', ['id' => $product->id]) }}">
                                                    @if ($product->stock > 0)
                                                        <button data-id={{ $product->id }}
                                                            class="addToCart btn btn-block btn-product btn-cart"
                                                            title="Add to Cart">Add To Cart</button>
                                                    @else
                                                        <button data-id={{ $product->id }}
                                                            class="addToCart btn btn-block btn-product btn-cart"
                                                            title="Out of Stock" disabled>Out of Stock</button>
                                                    @endif
                                                </a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $cat->name }}</a>
                                            </div><!-- End .product-cat -->
                                            <h2 style="font-size: 1.5rem;font-weight:400" class="product-title"><a
                                                    href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                            </h2><!-- End .product-title -->
                                            <div style="font-size:1.8rem" class="product-price">
                                                {{ $product->price }} Tk
                                            </div><!-- End .product-price -->

                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->

        <div class="more-container text-center mt-1 mb-3">
            <a href="{{ url($cat->id . '/category/products') }}" class="btn btn-outline-primary-2 btn-round btn-more">Load
                more</a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->

    </div>
    <!-- Modal -->
    <div class="modal fade" id="quickviewmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="product-details-area ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                    <div class="tab-content quickview-big-img" id="main-image">

                                    </div>
                                    <div class="quickview-wrap mt-15 border">
                                        <div class="quickview-slide-active nav-style-6" id="sub_images">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                    <form id="addToCartForm" action="" method="post">
                                        <input type="hidden" name="pro_id">
                                        <div
                                            class="
                                                product-details-content pro-details-content-mrg">
                                            <h2 id="pro_name"></h2>
                                            <div class="product-ratting-review-wrap">
                                                <div class="product-ratting-digit-wrap">
                                                    <div class="product-ratting" id="pro_rating_star">

                                                    </div>
                                                    <div class="product-digit">
                                                        <span id="pro_rating"></span>
                                                    </div>
                                                </div>
                                                <div class="product-review-order">
                                                    <span id="pro_review_count"></span>
                                                    <span id="pro_order_count"></span>
                                                </div>

                                            </div>
                                            <p></p>
                                            <div class="pro-details-price">
                                                <span class="new-price" id="pro_new_price"> </span>
                                                <span class="old-price" id="pro_old_price"> </span>
                                            </div>

                                            <div id="productColorDiv">
                                                <input type="number" id="colorInput" name="color_id" value="" hidden>
                                                <div class="pro-details-color-wrap">
                                                    <span>Colors:</span>
                                                    <div class="pro-details-color-content">
                                                        <ul>

                                                        </ul>
                                                        <p id="colorPtag" hidden>Color Desc: <span id="color_desc"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="productSizeDiv">
                                                <input type="number" id="sizeInput" name="size_id" value="" hidden>
                                                <div class="pro-details-size">
                                                    <span>Sizes:</span>
                                                    <div class="pro-details-size-content">
                                                        <ul>


                                                        </ul>
                                                        <p id="sizePtag" hidden>Size Desc: <span id="size_desc"></span></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pro-details-quality">
                                                <span>Quantity:</span>
                                                <div class="cart-plus-minus">
                                                    <input id="qty" class="cart-plus-minus-box" type="text" name="qty"
                                                        value="1">
                                                </div>
                                            </div>

                                            <div class="pro-details-add-to-cart" style="width: 30%">
                                                <input class="btn-success" id="quickViewSubmitBtn" data-id=""
                                                    type="submit" value="Add To Cart">
                                            </div>

                                        </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal end -->

    <script>
        $(document).ready(function() {

            @if (session()->has('subscribed'))
                $(document).ready(function(){
                toastr.options.timeOut = "3500";
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr['success']('{{ session('subscribed') }}');
                });
            @endif

            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            }
        });
    </script>











    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/demos/demo-5.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    {{-- <script>
    $('.input-2').rating({displayOnly: true, step: 0.1});
</script> --}}




@endsection
@section('scripts')

    <script src="{{ asset('js/quickView-product-details.js') }}"></script>
    @if (Auth::id())
        <script src="{{ asset('js/minicart-delete.js') }}"></script>
    @else
        <script src="{{ asset('js/session-minicart-delete.js') }}"></script>
    @endif



    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



@endsection
