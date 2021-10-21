    @if(!empty($service))
        <div class="service-area pb-115">
            <div style="padding-right:0;padding-left:0" class="container-fluid">
                <div class=" body service-wrap-border service-wrap-padding-3">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                @if(!empty($service->title1))
                                <div class="service-icon-2 icon-purple">
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                @endif
                                <div class="service-content-2">
                                    <h3>{{ $service->title1 }}</h3>
                                    <p>{{ $service->text1 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                            <div class="single-service-wrap-2 mb-30">
                                @if(!empty($service->title2))
                                <div class="service-icon-2 icon-purple">
                                    <i class="icon-refresh "></i>
                                </div>
                                @endif
                                <div class="service-content-2">
                                    <h3>{{ $service->title2 }}</h3>
                                    <p>{{ $service->text2 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                @if(!empty($service->title3))
                                <div class="service-icon-2 icon-purple">
                                    <i class="far fa-credit-card"></i>
                                </div>
                                @endif
                                <div class="service-content-2">
                                    <h3>{{ $service->title3 }}</h3>
                                    <p>{{ $service->text3 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap-2 mb-30">
                                @if(!empty($service->title4))
                                <div class="service-icon-2 icon-purple">
                                    <i class="fas fa-headset"></i>
                                </div>
                                @endif
                                <div class="service-content-2">
                                    <h3>{{ $service->title4 }}</h3>
                                    <p>{{ $service->text4 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="service-area pb-115">
            <div class="container">
                <div class="service-wrap-border service-wrap-padding-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <i class="icon-cursor"></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>Free Shipping</h3>
                                    <p>Orders over BDT 1000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <i class="far fa-thumbs-up "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>Quality Ensured</h3>
                                    <p>Best Quality Products</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <i class="icon-credit-card "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>Secure Payment</h3>
                                    <p>100% Guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <i class="icon-earphones "></i>
                                </div>
                                <div class="service-content-2">
                                    <h3>24h Support</h3>
                                    <p>Dedicated support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif