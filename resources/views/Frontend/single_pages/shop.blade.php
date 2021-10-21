@extends('Frontend.layouts.master')

@section('content')
<style>
    .pagination a.active {
        background-color: #ff5900 !important;
        border: none !important;
    }
</style>

<input type="text" value="{{url('')}}" id="baseUrl" hidden>
<div class="shop-area pt-120 pb-120">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <div class="view-mode nav">
                            <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                        </div>
                    </div>
                    <div class="product-sorting-wrapper">
                        <div class="product-show shorting-style">
                            <label>Sort by :</label>
                            <select id="sortBy">
                                <option value="">Default</option>
                                <option value="name"> Name</option>
                                <option value="price"> price</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row" id="shopArea">
                                @if(count((array)$products) > 0)
                                @foreach($products as $product)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                    <div class="single-product-wrap mb-35 shadow mb-4 mt-4 rounded">
                                        <div class="product-img product-img-zoom mb-15 text-center">
                                            <a href="{{route('product.details',$product->id)}}">
                                                <img src="{{"/upload/products_images/$product->image"}}"
                                                    style="height: 324px; width: 270px" alt="">
                                            </a>

                                            @if(!empty($product->promo_price))
                                            <span
                                                class="pro-badge left bg-red">{{ number_format( (($product->price - $product->promo_price)*100)/$product->price, 2, '.' , ',') }}%</span>
                                            @endif
                                            <div class="product-action-2 tooltip-style-2">

                                                <a href="{{ route('wishlist.add', $product->id) }}">
                                                    <button data-id={{$product->id}} class="addTowishlist"
                                                        title="Wishlist"><i class="icon-heart"></i></button>
                                                </a>
                                                <button class="q_m_btn" id="quickView_modal_btn"
                                                    data-id={{ $product->id }} title="Quick View"><i
                                                        class="icon-size-fullscreen icons"></i></button>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap-2 text-center">
                                            <div class="product-rating-wrap">
                                                @if(ceil($product->avg_rating) > 0)
                                                <div class="product-rating">
                                                    @if(ceil($product->avg_rating) == 1)
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
                                                </div>
                                                @if(count($product->reviews) > 0)
                                                <span>({{count($product->reviews)}})</span>
                                                @endif
                                                @else
                                                <div style="color: gray">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                </div>
                                                <span>({{count($product->reviews)}})</span>
                                                @endif
                                            </div>
                                            <h3><a href="{{route('product.details',$product->id)}}"
                                                    class="productName">{{$product->name}}</a></h3>
                                            <div class="product-price-2 mb-4">
                                                @if(empty($product->promo_price))
                                                <span class="new-price product-price">{{$product->price}}</span>Tk
                                                @else
                                                <span class="new-price product-price">{{$product->promo_price}}</span>Tk
                                                <span class="old-price">{{$product->price}}</span>Tk
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-content-wrap-2 product-content-position text-center">
                                            <div class="product-rating-wrap">
                                                @if(ceil($product->avg_rating) > 0)
                                                <div class="product-rating">
                                                    @if(ceil($product->avg_rating) == 1)
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
                                                </div>
                                                @if(count($product->reviews) > 0)
                                                <span>({{count($product->reviews)}})</span>
                                                @endif
                                                @else
                                                <div style="color: gray">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                </div>
                                                <span>({{count($product->reviews)}})</span>
                                                @endif
                                            </div>
                                            <h3><a
                                                    href="{{route('product.details',$product->id)}}">{{$product->name}}</a>
                                            </h3>
                                            <div class="product-price-2">
                                                @if(empty($product->promo_price))
                                                <span class="new-price">{{$product->price}} Tk</span>
                                                @else
                                                <span class="new-price">{{$product->promo_price}} Tk</span>
                                                <span class="old-price">{{$product->price}} Tk</span>
                                                @endif
                                            </div>
                                            <div class="pro-add-to-cart mb-4">
                                                <a href="{{route('product.details',['id' => $product->id])}}">
                                                    @if ($product->stock>0)
                                                        <button data-id={{$product->id}} class="addToCart" title="Add to Cart">Add To
                                                            Cart</button>
                                                    @else
                                                        <button data-id={{$product->id}} class="addToCart" title="Out of Stock" disabled>Out of Stock</button>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="col-12 text-center">No Result Found.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(count((array)$products) > 0)
                    <div class="text-center mt-10">
                        {{$products->links()}}
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                    <div class="sidebar-widget mb-40">
                        <h4 class="sidebar-widget-title">Search </h4>
                        <div class="sidebar-search">
                            <form id="search2" class="sidebar-search-form" action="#">
                                <input type="text" id="searchInput" placeholder="Search here...">
                                <button id="searchBtn">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                        <h4 class="sidebar-widget-title">Categories </h4>
                        <div class="shop-catigory">
                            <ul>
                                <li><a href="{{ route('products.shop') }}" class=""> All </a></li>
                                @foreach($categories as $row)
                                <li><a href="" class="categoryName">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title mb-2">Price Filter </h4>
                            <div class="row">
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">0</span>-<span class="second">100</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">101</span>-<span class="second">500</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">501</span>-<span class="second">1000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">1001</span>-<span class="second">2000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">2001</span>-<span class="second">2500</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span> <span class="first">2501</span>-<span class="second">5000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">5001</span> & <span class="second"></span>over
                                </div>
                            </div>
                        </div> --}}
                    <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                        <h4 class="sidebar-widget-title">Price Filter </h4>
                        <div class="price-filter">
                            <span>Range: &#2547;100.00 - 10000.00 </span>
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button id="filterBtn" type="button">Filter</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
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
                                    <div class="
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
                                            <input class="btn-success" id="quickViewSubmitBtn" data-id="" type="submit" value="Add To Cart">
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
@endsection
@section('scripts')
<script src="{{asset('js/searchFilter.js')}}"></script>
<script !src="">
    $(document).ready(function () {
            $(document).on('click','#filterBtn',function () {
                let price =  $('#amount').val();
                let price1 = price.replace('Tk.','');
                let price2 = price1.replace('Tk.','');
                let price3 = price2.split('-');
                let [first,second] = price3;
                const singleProduct = $('.singleProduct');
                for (let i = 0; i < singleProduct.length; i++){
                    let a = $(singleProduct[i]).find('.product-price').text();
                    if (parseInt(a) >= parseInt(first) && parseInt(a) <= parseInt(second)){
                        $(singleProduct[i]).css('display','block');
                    }else{
                        $(singleProduct[i]).css('display','none');
                    }
                }
            });
        });
</script>
<script src="{{asset('js/wishlist-product.js')}}"></script>
@if (Auth::id())
<script src="{{asset('js/minicart-delete.js')}}"></script>
@else
<script src="{{asset('js/session-minicart-delete.js')}}"></script>
@endif
<script src="{{asset('js/quickView-product-details.js')}}"></script>
<script !src="">
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    $(document).ready(function(){
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
            $(document).on('click', '.ajax_minicartclose', function(e){
            $('#minicart').removeClass('inside');
            });

            $(document).on('click', '.addToCart', function(e){
                //e.preventDefault();

                var url="{{url('add-to-cart')}}";
                var id =$(this).attr('data-id');

                $.ajax({
                    method:'POST',
                    url:url,
                    data:{id:id},
                    success: function(data){
                        //console.log(data.minicart);
                        console.log(data.cart);
                        if (data.success) {
                        //toastr.success(data.success);
                        $('#minicart').addClass('inside');
                        }
                        if (data.error) {
                        toastr.error(data.error);
                        }
                        //console.log(data.flag);
                        console.log(data.proSize);

                        $(document).ready(function () {
                            let count = $('.header-cart a[class="cart-active"]').find('.pro-count.purple')[0];
                            let cartCount = $(count).text();
                            $(count).text(data.cartCount);
                        });
                        console.log(data.cartCount);

                        $("#minicart").html(data.minicart);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
                e.preventDefault();

            });

        });


</script>




@endsection
@section('stylesheet')
<link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection
