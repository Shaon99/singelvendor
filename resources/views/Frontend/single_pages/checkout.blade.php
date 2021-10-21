@extends('Frontend.layouts.master')
@section('content')
    @php
    $contents = Cart::content();
    @endphp

    <div class="container">
        <h1 class="page-title">Checkout<span>Shop</span></h1>
    </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" type="text"
                                        placeholder="First Name" value="{{ @$users->name }}" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name (optional)</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter last name">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>City *</label>
                                    <input type="text"  class="form-control" tid="city" type="text" name="city"
                                        value="{{ @$users->city }}" placeholder="Enter city" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="text" minlength="11" class="form-control" type="number" id="phn"
                                        placeholder="Phone no" name="phone" value="{{ @$users->phone }}" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Reciever Phone *</label>
                                    <input type="text" minlength="11" class="form-control" type="number" id="phone"
                                        placeholder="Receiver phone number" name="phone" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Address *</label>
                                    <input type="tel" class="form-control" placeholder="House number and street name"
                                        type="text" name="address" id="add" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email address (optional)</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
                                value="{{ @$users->email }}">

                            <label>Order notes (optional)</label>
                            <textarea class="form-control" cols="30" rows="4"
                                placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->


            <aside class="col-lg-3">
                <div class="summary">
                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                    <table class="table table-summary">
                       
                   
                        <tbody>
                           
                            @if (Auth::user())
                            <div class="your-order-middle">

                                @foreach ($showCart as $show)
                                    @if ($show['product']['promo_price'])
                                        <li> Product :{{ $show['product']['name'] }} <span>
                                                ({{ $show->qty }}x{{ $show['product']['promo_price'] }}
                                                )</span></li>
                                    @else
                                        <li> Product :{{ $show['product']['name'] }} <span>
                                                ({{ $show->qty }}x{{ $show['product']['price'] }}
                                                )</span>
                                        </li>
                                    @endif


                                @endforeach
                            </div>
                            @php
                                $subammount = 0;
                                foreach ($showCart as $show) {
                                    if ($show->product->promo_price) {
                                        $subtotal = $show->product->promo_price * $show->qty;
                                    } else {
                                        $subtotal = $show->product->price * $show->qty;
                                    }
                                    $subammount += $subtotal;
                                }
                            @endphp
                            <div class="your-order-info order-subtotal">
                                <ul>
                                    <li>Subtotal <span> {{ $subammount }} tk</span></li>
                                    <input hidden id="subt" value={{ $subammount }}>

                                    <li><u style="color:#39B54A">Select Shipping Method</u></li>
                                    @foreach ($ship as $item)
                                        <li>
                                            <input
                                                value="{{ $item->cost . ' ' . 'TK' . ' ' }}{{ $item->name }}"
                                                class="s" id="sp" type="radio"
                                                style="left: 10px;
                                        width: 13px;
                                        height: 13px;
                                        border: solid white;
                                        border-width: 0 10px 10px 0;
                                        -webkit-transform: rotate(45deg);
                                        -ms-transform: rotate(45deg);
                                        transform: rotate(45deg);
                                        " name="ship"> {{ $item->name }}

                                            <span>{{ $item->cost }} TK</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="your-order-info order-total">
                                @if (!empty($showCart['0']->shippingMethod))
                                    @if (Session::has('cartcupon-' . auth()->id()))
                                        <ul>
                                            <li>Total
                                                <span>{{ $subammount - Session::get('cartcupon-' . auth()->id())[0] }}
                                                    tk </span>
                                            </li>
                                        </ul>
                                    @else
                                        <ul>
                                            <li>Total <span>{{ $subammount }} tk </span></li>
                                        </ul>
                                    @endif
                                @else
                                    @if (Session::has('cartcupon-' . auth()->id()))
                                        <ul>
                                            <li>Total
                                                <span>{{ $subammount - Session::get('cartcupon-' . auth()->id())[0] }}
                                                    tk </span>
                                            </li>
                                        </ul>
                                    @else
                                        <ul>
                                            <li>Total <span id="total">{{ $subammount }}
                                                    TK</span></li>
                                            <input hidden type="text" id='l' name="total"
                                                value={{ $subammount }}>

                                        </ul>
                                    @endif
                                @endif

                            </div>
                        @else
                            <div class="your-order-middle">
                                @foreach ($contents as $content)
                                    <li> Product :{{ $content->name }} <span>
                                            ({{ $content->qty }}x{{ $content->price }}
                                            )</span></li>
                                @endforeach
                                <div class="your-order-info order-subtotal">
                                    <ul>
                                        <li class="text-bold">Subtotal <span> {{ Cart::subtotal() }} tk</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="your-order-info order-total">
                                    <ul>
                                        {{-- @php
(float)$sum=Cart::subtotal();
@endphp --}}

                                        <li>Total <span>{{ Cart::subtotal() }} tk </span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        @endif
                        
                        </tbody>
                    </table><!-- End .table table-summary -->

                    <div class="accordion-summary" id="accordion-payment">
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="">Pay Now</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->

    </div>
    <hr>


<script>
    $("input:radio").first().click();


$("input:radio:first").prop("checked:true", function() {

    var a = parseInt($(this).val()) + parseInt($("#subt").val());
    $("#total").text(a + " " + "TK");

    $("#l").val(a);

});

// $("input:radio[disabled=false]:first").attr('checked', true);

$('.s').on("change", function() {
    var a = parseInt($(this).val()) + parseInt($("#subt").val());
    $("#total").text(a + " " + "TK");

    $("#l").val(a);

});
</script>





    @endsection
