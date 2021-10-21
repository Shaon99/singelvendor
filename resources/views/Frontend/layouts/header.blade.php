<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@if (!empty($header)) {{ $header->title }} @endif</title>
    <link rel="icon"
        href="{{ !empty($logos->image) ? url('upload/Logo_images/' . $logos->image) : url('upload/noImage.png') }}"
        type="image/gif" sizes="16x16">
    <meta name="robots" content="noindex, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->

    {{-- Facebook share meta tags --}}
    @yield('facebook-meta')
    {{-- Facebook share meta tags end --}}

    @if (!empty($logos))
        <link rel="shortcut icon" type="image/x-icon" src="{{ $logos->image }}">
    @else

    @endif

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
        integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/signericafat.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/cerebrisans.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/elegant.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/vendor/linear-icon.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/easyzoom.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ '' }}/assets/css/style1.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/skins/skin-demo-5.css">
    <link rel="stylesheet" href="{{ '' }}/assets/css/demos/demo-5.css">
    <style>
        .list-item:hover {
            background-color: white;
        }

    </style>
    @yield('stylesheet')
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>



    <!-- Facebook Pixel Code -->
    @if ($pixel != null)

        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $pixel->pixel_id }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $pixel->pixel_id }}&ev=PageView&noscript=1" /></noscript>
    @endif
    <!-- End Facebook Pixel Code -->
    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
        }

    </style>

</head>

<body>
    @yield('facebook-share-script')
    <div class="se-pre-con"></div>
    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>

    <style>
        @media only screen and (max-width: 420px) {
            .header-action .same-style-2 {
                margin-right: 8px;
            }
        }

    </style>

    <div class="">
        <header style="background-color:#00205b;max-width:100%;margin:0;" class="header header-5">
            <div style="background-color:#00205b;" class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        @if (!empty($logos))
                            <a href="{{ '/' }}" class="logo">
                                <img src="{{ !empty($logos->image) ? url('upload/Logo_images/' . $logos->image) : url('upload/noImage.png') }}"
                                    alt="Walrus logo" width="105" height="25">
                            </a>
                        @else
                            <a href="{{ '/' }}" class="logo">
                                <img src="{{ asset('upload/Logo_images/noImage.png') }}" alt="Walrus logo"
                                    width="105" height="25">
                            </a>
                        @endif


                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{ url('/') }}" class="sf-with-ul">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('products.shop') }}" class="sf-with-ul">Shop</a>
                                </li>

                                <li>
                                    <a href="#" class="sf-with-ul">Pages</a>

                                    <ul class="text-left">
                                        <li><a href="{{ route('about_us') }}">about us </a></li>
                                        <li><a href="{{ route('show.cart') }}">cart page</a></li>
                                        <li><a href="{{ route('checkout') }}">checkout </a></li>
                                        <li><a href="{{ route('userAccount') }}">my account</a></li>
                                        <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                        <li><a data-toggle="modal" data-target="#exampleModal">order tracking</a></li>
                                        <li><a href="{{ route('login') }}">login / register </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" class="sf-with-ul">Contact</a>
                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="categori-search-wrap categori-search-wrap-modify">

                            <div class="search-wrap-3">
                                <form action="{{ route('search.result') }}">
                                    <input name="search" id="searchText" placeholder="Search Products..."
                                        autocomplete="off" type="text">
                                    {{-- <input name="category" id="categoryInput" type="text" hidden> --}}
                                    <button style="color:white" id="searchBtn" type="submit"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>

                            <div class="col-md-12 overflow-auto src-result" style="position:absolute;">
                                <div style="background-color:transparent;" class="list-group shadow">
                                    <ul id="show-list" style="background-color:white !important">

                                    </ul>
                                </div>
                            </div>

                        </div>





                        @if (Auth::id())
                            <div class="same-style-2 same-style-2-font-inc">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt f fa-3x"></i>
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('userAccount') }}" class="wishlist-link">
                                <i class="far fa-user f"></i>
                            </a>
                        @endif
                    </div>











                    <a href="{{ route('wishlist.view') }}" class="wishlistcounter wishlist-link wish">
                        <i class="icon-heart-o  f"></i>
                        <span class="pro-count count">{{ $wishlist_num }}</span>
                    </a>
                    <div>

                    </div>

                    <style>
                        .f {
                            color: rgb(255, 249, 249);
                        }

                    </style>

                    <div class="same-style-2 same-style-2-font-inc header-cart">
                        <a class="cart-active" href=" {{ route('show.cart') }} ">
                            @if (Auth::id())
                                <i class="icon-shopping-cart f fa-3x"></i>
                                <span class="pro-count purple"> {{ $cart_num }} </span>
                            @else
                                <i class="icon-shopping-cart f fa-3x"></i>
                                <span class="pro-count purple"> {{ Cart::count() }} </span>
                            @endif

                            <span class="cart-amount"></span>
                        </a>


                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

        <div class="mobile-menu-container mobile-menu-light">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-close"></i></span>

                <form action="#" method="get" class="mobile-search">
                    <label for="mobile-search" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                        placeholder="Search in..." required>
                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </form>

                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('products.shop') }}">Shop</a>
                        </li>
                        <li>
                            <a class="sf-with-ul">Pages</a>
                            <ul class="text-left">
                                <li><a href="{{ route('about_us') }}">about us </a></li>
                                <li><a href="{{ route('show.cart') }}">cart page</a></li>
                                <li><a href="{{ route('checkout') }}">checkout </a></li>
                                <li><a href="{{ route('userAccount') }}">my account</a></li>
                                <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                <li><a href="{{ route('contact') }}">contact us </a></li>
                                <li><a data-toggle="modal" data-target="#exampleModal">order tracking</a></li>
                                <li><a href="{{ route('login') }}">login / register </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="blog.html">ontact</a>
                        </li>

                    </ul>
                </nav><!-- End .mobile-nav -->

                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                            class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                            class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                            class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                            class="icon-youtube"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div><!-- End .mobile-menu-container -->


        <!-- mini cart start -->
        <div id="minicart" class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icon_close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>

                    @php
                        $total = 0;
                    @endphp
                    @if (Auth::user())
                        <ul>
                            @if (!empty($cartpage))
                                @foreach ($cartpage as $cart)
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img
                                                    src="{{ asset('upload/products_images/' . $cart->product->image) }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h4><a href="#">{{ $cart->product->name }}</a></h4>
                                            @if ($cart->product->promo_price)
                                                <span> {{ $cart->qty }} × {{ $cart->product->promo_price }} tk
                                                </span>
                                            @else
                                                <span> {{ $cart->qty }} × {{ $cart->product->price }} tk </span>
                                            @endif

                                        </div>
                                        <div id="minicart-delete" data-id="{{ $cart->id }}" class="cart-delete">
                                            <a>×</a>
                                        </div>
                                    </li>
                                    @php
                                        if ($cart->product->promo_price) {
                                            $subtotal = $cart->product->promo_price * $cart->qty;
                                        } else {
                                            $subtotal = $cart->product->price * $cart->qty;
                                        }
                                        $total += $subtotal;
                                    @endphp
                                @endforeach
                            @endif

                        </ul>
                        <div class="cart-total">
                            <h4>Subtotal: <span>{{ $total }}tk</span></h4>
                        </div>
                    @else
                        <ul>
                            @php
                                $contents = Cart::content();
                                $total = 0;
                            @endphp
                            @foreach ($contents as $content)
                                <li class="single-product-cart">
                                    <div class="cart-img">
                                        <a href="#"><img
                                                src="{{ asset('upload/products_images/' . $content->options->image) }}"
                                                alt=""></a>
                                    </div>
                                    <div class="cart-title">
                                        <h4><a
                                                href="{{ route('product.details', ['id' => $content->id]) }}">{{ $content->name }}</a>
                                        </h4>
                                        <span> {{ $content->qty }} × {{ $content->price }} tk </span>
                                    </div>
                                    <div id="minicart-delete" data-id="{{ $content->rowId }}" class="cart-delete">
                                        <a>×</a>
                                    </div>
                                </li>
                                @php
                                    $total += $content->subtotal;
                                @endphp
                            @endforeach


                        </ul>
                        <div class="cart-total">
                            <h4>Subtotal: <span>{{ $total }}tk</span></h4>
                        </div>
                    @endif
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="{{ route('show.cart') }}">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="{{ route('checkout') }}">checkout</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
