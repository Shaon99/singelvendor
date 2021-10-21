@extends('Frontend.layouts.master')

@section('content')
<style type="text/css">
    .prof li{
        background:cornflowerblue;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
    }
    .prof li a{
        color: wheat;
        padding-left: 15px;
    }
    .mytable tr td{
        padding: 15px;
    }
    .not-found{
        text-align: center;
    }

    </style>

<div class="container">
    <a  class=" ml-1 btn btn-success mt-3" href="/user/userAccount">Back to Order</a>

<div class="row clearfix">




    <div id="DivIdToPrint" class="col-lg-12">
        <div class="card-body">
            @if(!empty($order->id))
            <div class="row">
                <table class="txt-center table table-bordered mytable" width="100%" border="1">
                    <tr>
                        <td width="30%">
                            <br><br>
                            <h5>Date: <strong>{{ $order->date }}</strong></h5>
                        </td>
                        <td colspan="">
                            <br><br>
                            <h5><strong>Order Details</strong></h5>

                        </td>
                        <td colspan="4">
                            <br><br>
                            <h5><strong>Order Code: #{{ $order->order_code }}</strong></h5>
                        </td>
                        <td>
                            <br>
                            <h5><strong>Payment:#{{ $order->payment }}</strong></h5>

                            @if ($order->payment=='Bkash')
                            <span> (Bkash Mobile: <strong>{{ $order->bkash_mobile }}</strong>)</span>
                            <br>
                            <span> (Transaction No: <strong>{{ $order->transaction }}</strong>)</span>
                            @endif

                            @if ($order->payment=='Rocket')
                            <span> (Rocket Mobile: <strong>{{ $order->bkash_mobile }}</strong>)</span>
                            <br>
                            <span> (Transaction No: <strong>{{ $order->transaction }}</strong>)</span>
                            @endif

                            @if ($order->payment=='Nagad')
                            <span> (Nagad Mobile: <strong>{{ $order->bkash_mobile }}</strong>)</span>
                            <br>
                            <span> (Transaction No: <strong>{{ $order->transaction }}</strong>)</span>
                            @endif
                            <br>
                        </td>
                        {{-- <td></td>
                        <td></td>
                        <td></td> --}}
                    </tr>
                    <tr>
                        <td><strong>Shipping Information</strong></td>
                        <td colspan="6" style="text-align: left;">
                            <strong>Name: </strong>{{ $order->biling_fname.' '.$order->biling_lname }}
                            &nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                            <strong>Email: </strong>{{ $order->biling_email }}&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                            <strong>Address: </strong>{{ $order->biling_address }}&nbsp;&nbsp&nbsp;&nbsp;<br>
                            <strong>Shipping Cost and Method:
                            </strong>{{ $order->shipping_method }}&nbsp;&nbsp&nbsp;&nbsp;<br>
                            <strong>Mobile: </strong>{{ $order->biling_phone }}&nbsp;&nbsp;
                            <br>

                            {{-- <strong>Shipping Method: </strong>{{ $order->shippingMethod->name }}&nbsp;&nbsp;
                            <strong>Shipping Cost: </strong>{{ $order->shippingMethod->cost }} tk&nbsp;&nbsp; --}}
                        </td>

                    </tr>

                    <tr>
                        <td colspan="7">
                            <h5 style="text-align: center">Order Details</h5>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Product Name & Image</strong></td>
                        <td style="text-align: center"><strong>Quantity</strong></td>
                        <td style="text-align: center"><strong>Price</strong></td>
                        <td colspan="4" style="text-align: center"><strong>Total</strong></td>
                    </tr>
                    @foreach ($product as $key=>$details)
                    @if(isset($details->product['id']))
                    <tr>
                        <td>
                            <img src="{{ asset('upload/products_images/'.$details->product['image']) }}"
                                style="width: 70px; height: 50px;"> &nbsp; {{ $details->product['name'] }}
                        </td>
                     
                        <td style="text-align: center">
                            {{ $details['qty'] }}
                        </td>

                        <td style="text-align: center">
                            @if ($details->product['promo_price'])
                            {{ $details->product['promo_price'] }} tk <br>
                            @else
                            {{ $details->product['price'] }} tk <br>
                            @endif
                            @if ($details->product['promo_price'])
                            @php
                            $subtotal=$details['qty']* $details->product['promo_price'];
                            @endphp
                            @else
                            @php
                            $subtotal= $details['qty']* $details->product['price'];
                            @endphp

                            @endif



                        </td>
                        <td colspan="4" style="text-align: center;">
                            Total {{ $subtotal }} TK
                        </td>

                    </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="5" style="text-align: right; color:black"><strong>Shipping Cost and Method</strong></td>
                        <td style="text-align: center" colspan="2"><strong style="color: black">{{ $order->shipping_method }}</td>
                    </tr>
                    <tr style="background: coral">
                        <td colspan="5" style="text-align: right; color:black"><strong>Grand Total</strong></td>
                        <td style="text-align: center" colspan="2"><strong style="color: black">{{ $order->total }}
                                TK</strong></td>

                    </tr>


                </table>

            </div>
            @else <div class="not-found center alert alert-danger">Product Not found!</div>
            @endif
        </div>
    </div>

</div>
</div>

@endsection
