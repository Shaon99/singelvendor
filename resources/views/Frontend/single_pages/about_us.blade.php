@extends('Frontend.layouts.master')

@section('content')

{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    


        <main class="main">

            <br> <br>

            <div class="page-content pb-3 pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="about-text text-center mt-3">
                                <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                                <p>@if (!empty($about))
                                    {!! $about->content !!}
                                @endif</p>
                                <img src="{{url('assets/images/about/signature.png')}}" alt="signature" class="mx-auto mb-5">

                                <img src="{{ asset('upload/about_image/' . $about->about_image)  }}" alt="image" class="mx-auto mb-6">
                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $about_service->title1 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $about_service->text1 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $about_service->title2 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $about_service->text2 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $about_service->title3 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $about_service->text3 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="mb-2"></div><!-- End .mb-2 -->

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="brands-text text-center mx-auto mb-6">
                                <h2 class="title">Premium Brands</h2>
                            </div><!-- End .brands-text -->
                            <div class="brands-display">
                                <div class="row justify-content-center">
                                    @foreach(\App\Model\brand::take(8)->get() as $brand)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <a href="#" class="brand">
                                            <img style="width: 150px !important;" src="{{ asset("upload/brand_image/$brand->brand_image") }}" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-md-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .brands-display -->
                        </div><!-- End .col-lg-10 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection
