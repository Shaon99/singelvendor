@extends('admin.layout.master')
@section('title', 'Order Details')
@section('pageTitle') <a href="#">Order Details</a> @endsection
@section('parentPageTitle') <a href="{{route('order.view')}}">Orders</a> @endsection


@section('content')
<style type="text/css">
    .prof li {
        background: cornflowerblue;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
    }

    .prof li a {
        color: wheat;
        padding-left: 15px;
    }

    .mytable tr td {
        padding: 15px;
    }

    .not-found {
        text-align: center;
    }
</style>


<div class="d-flex flex-row-reverse bd-highlight">
    <div class="btn-group">
        <h3 class="text-center mr-3" style="color: rgb(5, 4, 0)">Order status</h3>
        <button class="btn btn-primary  btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            @if ($order->status==0)
            <span class="badge badge-pill badge-priamry text-light">Pendeing</span>
            @elseif($order->status==1)
            <span class="badge badge-pill badge-priamry text-light">Accepted</span>
            @elseif($order->status==2)
            <span class="badge badge-pill badge-danger text-light">Delivered</span>

            @endif

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('order.returnPending',$order->id) }}">Pending</a>

            <a class="dropdown-item" href="{{ route('order.status',$order->id) }}">Accept</a>

            <a class="dropdown-item" href="{{ route('order.delivarystatus',$order->id) }}">Delivary</a>
        </div>
    </div>
</div>
<div class="row clearfix">

    <div>
        <input type='button' class="ml-4 btn btn-primary" id='btn' value='Print' onclick='printDiv();'>
    </div>


    <div id="DivIdToPrint" class="col-lg-12">
        <div class="card-body">
            @if(!empty($order->id))
            <div class="row">
                <table class="txt-center table table-bordered mytable" width="100%" border="1">
                    <tr>
                        <td width="30%">
                            <h5>Date: <strong>{{ $order->date }}</strong></h5>
                        </td>
                        <td colspan="">
                            <h5><strong>Order Details</strong></h5>

                        </td>
                        <td colspan="4" >
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
                            <strong>Shipping Cost and Method: </strong>{{ $order->shipping_method }}&nbsp;&nbsp&nbsp;&nbsp;<br>
                            <strong>Mobile: </strong>{{ $order->biling_phone }}&nbsp;&nbsp;
                            <br>

                            {{-- <strong>Shipping Method: </strong>{{ $order->shippingMethod->name }}&nbsp;&nbsp;
                            <strong>Shipping Cost: </strong>{{ $order->shippingMethod->cost }} tk&nbsp;&nbsp; --}}
                        </td>

                    </tr>

                    <tr>
                        <td colspan="7"><h5 style="text-align: center">Order Details</h5> </td>
                    </tr>
                    <tr>
                        <td><strong>Product Name & Image</strong></td>
                        <td><strong>Size</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Price</strong></td>
                        <td colspan="4" style="text-align: center"><strong>Total</strong></td>
                    </tr>

                    @foreach ($product as $key=>$details)
                    @if(isset($details->product['id']))
                    <tr>
                        <td >
                            <img src="{{ asset('upload/products_images/'.$details->product['image']) }}"
                                style="width: 70px; height: 50px;"> &nbsp; {{ $details->product['name'] }}
                        </td>


                        <td style="text-align: center">
                            @if(\App\Model\size::find($details['size_id']))
                                 {{ \App\Model\size::find($details['size_id'])->name }}
                            @else
                                --
                            @endif
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
                        <td colspan="5" style="text-align: right; color:black"><strong>Shipping Method and Cost</strong></td>
                        <td style="text-align: center" colspan="2"><strong style="color: black">{{ $order->shipping_method}}</strong></td>

                    </tr>
                    <tr style="background: coral">
                        <td colspan="5" style="text-align: right; color:black"><strong>Grand Total</strong></td>
                        <td style="text-align: center" colspan="2"><strong style="color: black">{{ $order->total }} TK</strong></td>

                    </tr>


                </table>

            </div>
            @else <div class="not-found center alert alert-danger">Product Not found!</div>
            @endif
        </div>
    </div>

</div>
<script>
    function printDiv()
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endsection
