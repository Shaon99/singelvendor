@extends('Frontend.layouts.master')
@section('content')
    <br> <br>

    @if(Session::get('success1'))
        <div class="alert text-white container" style="background: #da1630;">
            {{ Session::get('success1') }}
        </div>
    @endif

    <main class="main pt-40">
        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom"
                                             src="{{ asset("upload/products_images/$product->image") }}"
                                             data-zoom-image="{{ asset("upload/products_images/$product->image") }}"
                                             alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                           data-image="{{ asset("upload/products_images/$product->image") }}"
                                           data-zoom-image="{{ asset("upload/products_images/$product->image") }}"><img
                                                src="{{ asset("upload/products_images/$product->image") }}"
                                                alt="product side">
                                        </a>

                                        @foreach($product->sub_images as $sub)
                                            <a class="product-gallery-item" href="#"
                                               data-image="{{ asset("upload/products_images/sub_images/$sub->image") }}"
                                               data-zoom-image="{{ asset("upload/products_images/sub_images/$sub->image") }}"><img
                                                    src="{{ asset("upload/products_images/sub_images/$sub->image") }}"
                                                    alt="product cross">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: @php
                                           if (ceil($product->avg_rating) == 5.0) {
                                                echo 100;
                                            } elseif (ceil($product->avg_rating) == 4.0) {
                                                echo 80;
                                            } elseif (ceil($product->avg_rating) == 3.0) {
                                                echo 60;
                                            } elseif (ceil($product->avg_rating) == 2.0) {
                                                echo 40;
                                            } elseif (ceil($product->avg_rating) == 1.0) {
                                                echo 20;
                                            } else {
                                                echo 0;
                                            }
                                            @endphp%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( {{ $reviews->count() }} Reviews
                                        )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    {{ ($product->promo_price) ? $product->promo_price : $product->price }} Tk.
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>{{ $product->short_desc }}</p>
                                </div><!-- End .product-content -->


                                <form action="{{ route('insert.cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <div class="details-filter-row details-row-size">
                                        @if($product->sizes->count() > 0)
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                                <select name="size_id" id="size" class="form-control">
                                                    <option value="#" selected="selected">Select a size</option>
                                                    @foreach($product->sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div><!-- End .select-custom -->
                                        @endif
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required name="qty">
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>

                                        <div class="details-action-wrapper">
                                            <a href="#" class="wishlist btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>

                                        </div><!-- End .details-action-wrapper -->
                                        <div class="fb-share-button ml-3"
                                             data-href="{{url('/'.$product->id.'/product-details')}}"
                                             data-layout="button" data-size="large">
                                        </div>
                                    </div><!-- End .product-details-action -->
                                </form>

                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->
    </main>

    <div class="description-review-wrapper pb-110">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="dec-review-topbar nav mb-45">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details2">Specification</a>
                        <a data-toggle="tab" href="#des-details4">Reviews and Ratting </a>
                    </div>
                    <div class="tab-content dec-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="description-wrap">
                                <p>{{$product->short_desc}}</p>
                                <p>{{$product->long_desc}}</p>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="specification-wrap table-responsive">
                                <table class="text-center">
                                    <tbody>
                                    <tr>
                                        <td class="title width1">Name</td>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Categories</td>
                                        <td>{{isset($product->category->name) ? $product->category->name: "----"}}</td>
                                    </tr>
                                    @if(count($product->sizes) > 0)
                                        <tr>
                                            <td class="title width1">Size</td>
                                            <td>
                                                @foreach($product->sizes as $size)
                                                    {{$size->size}},
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="title width1">Brand</td>
                                        <td>{{isset($product->brand) ? $product->brand->name: "----"}}</td>
                                    </tr>
                                    @if(count($product->colors) > 0)
                                        <tr>
                                            <td class="title width1">Color</td>
                                            <td>
                                                @foreach($product->colors as $color)
                                                    {{$color->name}} ,
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($reviews)
                            <div id="des-details4" class="tab-pane">
                                <div class="review-wrapper">
                                    @foreach($reviews1 as $review)
                                        <div class="single-review">
                                            <div class="review-img">
                                                <img
                                                    src="{{ (!empty(auth()->user()->image)) ? url('upload/users/'.auth()->user()->image):url('upload/noImage60x60.jpg') }}"
                                                    alt="user image" width="60px" height="60px">
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap d-flex">
                                                    <div class="review-name"><h5><span>{{$review->name}}</span> - {{$review->created_at}}
                                                        </h5>
                                                    </div>
                                                    <div class="review-rating float-right">
                                                        @if($review->rating == 1)
                                                            <i class="yellow icon_star"></i>
                                                        @elseif($review->rating == 2)
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                        @elseif($review->rating == 3)
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                        @elseif($review->rating == 4)
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                        @elseif($review->rating == 5)
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                            <i class="yellow icon_star"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                                <p>{{$review->review}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if($reviews->count() > 3)
                                        <a href="{{route('product.details.reviews',$product->id)}}">
                                            <h4 class="text-center">See All {{$reviews->count()}} Reviews</h4>
                                        </a>
                                    @endif
                                </div>
                                @if(Auth::id())


                                    <div class="ratting-form-wrapper">
                                        <span>Add a Review</span>

                                        <div class="ratting-form">
                                            <form action=" {{ route('store-review', $product->id) }} " method="post">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="star-box-wrap">
                                                            <div class="single-ratting-star">
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                            </div>
                                                            <div class="single-ratting-star">
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                            </div>
                                                            <div class="single-ratting-star">
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                            </div>
                                                            <div class="single-ratting-star">
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                            </div>
                                                            <div class="single-ratting-star">
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                                <a href="#/"><i class="icon_star"></i></a>
                                                            </div>
                                                        </div>
                                                        <input type="number" id="rating" name="rating" value="" hidden>
                                                        @error('rating')
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="rating-form-style mb-20">
                                                            <label>Your review <span>*</span></label>
                                                            <textarea maxlength="255" id="review" name="review" onkeyup="checklimit()"></textarea>
                                                        </div>
                                                        @error('review')
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-submit">
                                                            <input type="submit" value="Submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                @else

                                    <p class="text-center"><a href="/login" class="btn btn-success">Write a Customer
                                            Review</a></p>
                                @endif
                            </div>
                        @else
                            <div id="des-details4" class="tab-pane">
                                <div class="review-wrapper">
                                    <h2>No reviews</h2>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
         data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
        @foreach($related_products as $related_product)
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="{{ asset("upload/products_images/$related_product->image")  }}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#" class="wishlist btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                       
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a data-id={{ $product->id }} href="#" class="addToCart btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{ $related_product->category->category_id }}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{ route('product.details', $related_product->id) }}">{{ $related_product->name }}</a></h3>
                    <!-- End .product-title -->
                    <div style="width: 100%" class="product-price">
                        <span style="margin-left: auto;margin-right:auto">{{ $related_product->price }} TK</span>
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width:  @php
                                if (ceil($related_product->avg_rating) == 5.0) {
                                     echo 100;
                                 } elseif (ceil($related_product->avg_rating) == 4.0) {
                                     echo 80;
                                 } elseif (ceil($related_product->avg_rating) == 3.0) {
                                     echo 60;
                                 } elseif (ceil($related_product->avg_rating) == 2.0) {
                                     echo 40;
                                 } elseif (ceil($related_product->avg_rating) == 1.0) {
                                     echo 20;
                                 } else {
                                     echo 0;
                                 }
                            @endphp%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( {{ $related_product->reviews->count() }} Reviews )</span>
                    </div><!-- End .rating-container -->

                    <!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        @endforeach
    </div><!-- End .owl-carousel -->
    <script>
        // // initialize with defaults
        // $("#input-1").rating();
        $('.input-2').rating({displayOnly: true, step: 0.1});
        var checklimit = function () {
            if (document.getElementById('review').value.length >= 255) {
                alert('You have exceeded your review limit!');
            }
        };
    </script>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="{{asset('js/product-details.js')}}"></script>
    @if (Auth::id())
        <script src="{{asset('js/minicart-delete.js')}}"></script>
    @else
        <script src="{{asset('js/session-minicart-delete.js')}}"></script>
    @endif
    <script !src="">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready(function () {
            @if(session()->has('success_msg'))
            $(document).ready(function(){
                toastr.options.timeOut = "3500";
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr['success']('{{session('success_msg')}}');
            });
            @endif

            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.wishlist', function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    method: 'get',
                    url: '{{ route('wishlist.add', $product->id) }}',
                    data: {id: id},
                    success: function (data) {
                        if (data.success) {
                            toastr.success(data.success);
                        }
                        if (data.error) {
                            toastr.error(data.error);
                        }
                        if (data.redirect) {
                            // data.redirect contains the string URL to redirect to
                            window.location.assign('/login');
                        }
                        //alert(data.cartCount);

                        //console.log(data.flag);
                        //console.log(data.proSize);

                        $(document).ready(function () {
                            let count = $('.wishlistcounter a[class="viper"]').find('.pro-count.purple')[0];

                            let cartCount = $(count).text();
                            $(count).text(data.cartCount);
                        });
                        console.log(data.cartCount);

                        // $("#minicart").html(data.minicart);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
                e.preventDefault();
            });
        });
    </script>

@endsection

@section('facebook-meta')
    <meta property="og:url" content="{{url('/'.$product->id.'/product-details')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$product->name}}"/>
    <meta property="og:description" content="{{$product->short_desc}}"/>
    <meta property="og:image" content="{{asset('/upload/products_images/'.$product->image)}}"/>
@endsection

@section('facebook-share-script')
    {{--Facebook Share Scripts--}}
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    {{--Facebook share Scripts ends--}}
@endsection
