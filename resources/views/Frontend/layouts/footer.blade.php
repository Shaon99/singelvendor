
<style>
    .copy a:hover{
        color: orangered;
    }
    .copy p{
        color:lightgray;
        text-align: center;
    }
</style>

@php
    $social = \App\Social::first();
@endphp

<div class="container">
    <div class="cta cta-separator mb-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="cta-wrapper cta-text text-center">
                    <h3 class="cta-title">{{ $social->heading }}</h3><!-- End .cta-title -->
                    <p class="cta-desc">{{ $social->sub_heading }}</p><!-- End .cta-desc -->

                    <div class="social-icons social-icons-colored justify-content-center">
                        @if($social->facebook_link)
                            <a href="{{ $social->facebook_link }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        @endif

                        @if($social->twitter_link)
                            <a href="{{ $social->twitter_link }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        @endif

                        @if($social->instragram_link)
                            <a href="{{ $social->instragram_link }}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        @endif

                        @if($social->youtube_link)
                            <a href="{{ $social->youtube_link }}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        @endif

                        @if($social->pinterest_link)
                            <a href="{{ $social->pinterest_link }}" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        @endif
                    </div><!-- End .soial-icons -->
                </div><!-- End .cta-wrapper -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <div class="cta-wrapper text-center">
                    <h3 class="cta-title mb-3">Get the Latest Deals</h3><!-- End .cta-title -->
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required name="email">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-rounded" type="submit"><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .cta-wrapper -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .cta -->
</div><!-- End .container -->
<footer style="background-color:#00205b" class="footer-area -4">
    <div style="padding-top:50px;border-bottom: 1px solid #ff5900" class="footer-top">
        <div class="container">
            <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-6 col-12">

                             <div>

                                   @if(!empty($logos))
                                    <a href="{{"/"}}"><img style="width: 150px;height:150px" src="{{ (!empty($logos->image))?url('upload/Logo_images/'.$logos->image):url('upload/noImage.png') }}" alt="logo"></a>
                                    @else
                                   <a href="{{"/"}}"><img src="{{ asset('upload/Logo_images/noImage.png') }}"
                                        style=" max-width:200px; max-height:50px; " alt="Discovery Agro" class="img-responsive logo"></a>

                                   @endif
                                </div> <br>

                            <div>
                                <h4 style="color:white;line-height:1.5;padding-right:20%;font-size:1.2rem">We are committed to providing you the best gardening tools, organic fertilizers and supplies at the best possible way.</h4>
                            </div><br>
                            @if(!empty($contacts))
                            <div style="margin-left: 0;" class="social-style-1 social-style-1-mrg mb-4">
                                @if($contacts->twitter)
                                    <a target="_blank" href="{{$contacts->twitter}}"><i style="color:white" class="icon-social-twitter"></i></a>
                                @endif
                                @if($contacts->facebook)
                                    <a target="_blank" href="{{$contacts->facebook}}"><i style="color:white" class="icon-social-facebook"></i></a>
                                @endif
                                @if($contacts->instagram)
                                    <a target="_blank" href="{{$contacts->instagram}}"><i style="color:white"class="icon-social-instagram"></i></a>
                                @endif
                                @if($contacts->youtube)
                                    <a target="_blank" href="{{$contacts->youtube}}"><i style="color:white"class="icon-social-youtube"></i></a>
                                @endif
                                @if($contacts->pioneer)
                                    <a target="_blank" href="{{$contacts->pioneer}}"><i style="color:white"class="icon-social-pinterest"></i></a>
                                @endif
                            </div>
                            @endif

                </div>


                @if($categories->isNotEmpty())
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <h3 style="color:#ff5900" class="footer-title">Quick Shop</h3>
                        <div class="footer-info-list ">
                            <ul>
                                @foreach($categories as $i => $cat)
                                    @if( $i >= 6 )
                                        @break
                                    @endif
                                    <li ><a style="color:white" href="{{ route('productByCategory', $cat->id) }}">{{ $cat->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                @endif

                @if(!empty($contacts))
                <div id="contact" class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-widget mb-40 ">
                        <h3 style="color:#ff5900" class="footer-title">Contact Us</h3>
                        <div class="contact-info-2">
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:#ff5900" class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-info-2-content contact-info-2-content-purple">
                                    <p style="color:white">Got a question? Call us 24/7</p>
                                    <h3 style="color:white" class="purple">{{ $contacts->mobile_no }}</h3>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:#ff5900" class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p style="color:white">{{ $contacts->address }}</p>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i style="color:#ff5900" class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p style="color:white" >{{ $contacts->email }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @else
                <p>No contact data available!</p>
                @endif
            </div>
        </div>
    </div>

    <div  class="footer-bottom">

        @if(!empty($copyright))
        <div class="container copy">
            <p> {!! $copyright->title !!} </p>
        </div>
        @endif
    </div>

    {{--Modal Starts here--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="modal-content" style="width: 100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                </div>
                <div class="modal-body m-0" style="margin-top: -10% !important;">
                    <label for="order_code"></label>
                    <input type="text" class="form-control" name="order_code" id="order_code" placeholder="Give your order code!!" autocomplete="off">
                    <button type="button" id="tracking-button" class="btn btn-success mt-2">Track Order</button>

                    <div style="background: #FFF3CD" id="status" hidden>
                        <h4 class="text-center mt-2" id="status-text" style="padding: 10px 0"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Modal ends here--}}
</footer>

</div>


<!-- All JS is here
============================================ -->

<script src="{{""}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{""}}/assets/js/plugins/slick.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.instagramfeed.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="{{""}}/assets/js/plugins/wow.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui-touch-punch.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{""}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{""}}/assets/js/plugins/sticky-sidebar.js"></script>
<script src="{{""}}/assets/js/plugins/easyzoom.js"></script>
<script src="{{""}}/assets/js/plugins/scrollup.js"></script>
<script src="{{""}}/assets/js/plugins/ajax-mail.js"></script>

<script !src="">
    $('#exampleModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>


<script src="{{""}}/assets/js/main.js"></script>
<script src="{{""}}/js/search.js"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/order_tracking.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script !src="">
    $(document).ready(function(){
        $('#trackYourOrderBtn').on('click',function () {
            $('#modal-content').css('width','50%');
        });

        $('#mobileViewOrderTrackingBtn').on('click',function () {
                $('#modal-content').css('width','100%');
                document.getElementById('sidebar-close').click();
        })

        $('#footerOrderTrackingBtn').on('click',function () {
            if(window.matchMedia("(max-width: 767px)").matches){
                $('#modal-content').css('width','100%');
            }else{
                $('#modal-content').css('width','45%');
            }
        });
    });
</script>

<script>
     $(document).ready(function () {
        $('#searchText').on('keyup',function () {

            var query = $(this).val();
            if ($(this).val() == ''){
                $('#show-list').html('');
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/search-result-ajax',
                    data: {
                        search: query
                    },
                    success: function (data) {
                        console.log(data);
                        $('#show-list').html('');
                        for (var i = 0; i < data.length; i++){
                            $('#show-list').append(`
                        <li class="list-item border-bottom-1 p-2" style="margin: 0px;">
                                            <a href="../../${data[i].id}/product-details" class="single-item">
                                            <div class="row">
                                                <div class="col-4">
                                                     <div class="product-image">
                                                    <img style="height: 70px; width: 70px" src="../../upload/products_images/${data[i].image}" alt="product image" class="">
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="product-info">
                                                        <div class="product-info-top"><h6 class="pro-name">${data[i].name}</h6></div>
                                                    </div>
                                                    <div class="pro-price">Tk. ${data[i].price}</div>
                                                </div>
                                            </div>
                                            </a>
                                        </li>

                    `);
                        }

                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }

        });
    });
    //auto search ends
</script>
<script>
       //Auto search mobile view
    $(document).ready(function () {
        $('#searchText2').on('keyup',function () {
            var query = $(this).val();
            if ($(this).val() == ''){
                $('#mobile-search').html('');
            }else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/search-result-ajax',
                    data: {
                        search: query
                    },
                    success: function (data) {
                        console.log(data);
                        $('#mobile-search').html('');
                        for (var i = 0; i < data.length; i++){
                           $('#mobile-search').append(`
                            <li class="border-bottom-1 p-1">
                             <a href="../../${data[i].id}/product-details">
                                <div class="row">
                                    <div class="col-4">
                                        <img style="height: 70%; width: 70%" src="../../upload/products_images/${data[i].image}" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h5>${data[i].name}</h5>
                                        <p>${data[i].price}</p>
                                    </div>
                                </div>
                            </a>
                             </li>

                           `);
                        }

                    },
                    error: function (error) {
                        console.log(error)
                    }
                })

            }
        });
    });
    //Auto search mobile view ends
</script>
<script src="{{""}}/assets/js/owl.carousel.min.js"></script>

<script src="{{""}}/assets/js/jquery.min.js"></script>
<script src="{{""}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{""}}/assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{""}}/assets/js/jquery.waypoints.min.js"></script>
<script src="{{""}}/assets/js/superfish.min.js"></script>
<script src="{{""}}/assets/js/owl.carousel.min.js"></script>
<script src="{{""}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{""}}/assets/js/jquery.plugin.min.js"></script>
<script src="{{""}}/assets/js/jquery.countdown.min.js"></script>

<!-- Main JS File -->
<script src="{{""}}/assets/js/main1.js"></script>
<script src="{{""}}/assets/js/demos/demo-5.js"></script>
<!-- Main JS -->

<script src="{{""}}/js/search.js"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/order_tracking.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
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
               // toastr.success(data.success);
                $('#minicart').addClass('inside');
                }
                if (data.error) {
                toastr.error(data.error);
                }
                    //toastr.success(data.success);
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












@section('scripts')

<script src="{{asset('js/wishlist-product.js')}}"></script>
<script src="{{asset('js/quickView-product-details.js')}}"></script>
@if (Auth::id())
<script src="{{asset('js/minicart-delete.js')}}"></script>
@else
<script src="{{asset('js/session-minicart-delete.js')}}"></script>
@endif

@yield('scripts')

</body>

</html>
