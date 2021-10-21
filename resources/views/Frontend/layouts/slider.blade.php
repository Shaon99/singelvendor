 <style>
            .text-position {
                position: absolute;
                top:250px;
                left: 50px;
}
.img-position {
                position: absolute;
                top:200px;
                right: 50px;
}
.animate {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.two {
-webkit-animation-delay: 0.5s;
-moz-animation-delay: 0.5s;
animation-delay: 2s;
}
.one {
-webkit-animation-delay: 0.5s;
-moz-animation-delay: 0.5s;
animation-delay: 0.5s;
}
/*==== FADE IN UP ===*/
@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 80%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}
@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
 }
@-webkit-keyframes fadeInDown {
0% {
	opacity: 0;
	-webkit-transform: translate3d(0, -100%, 0);
	transform: translate3d(0, -100%, 0);
}
100% {
	opacity: 1;
	-webkit-transform: none;
	transform: none;
}
}
@keyframes fadeInDown {
0% {
	opacity: 0;
	-webkit-transform: translate3d(0, -100%, 0);
	transform: translate3d(0, -100%, 0);
}
100% {
	opacity: 1;
	-webkit-transform: none;
	transform: none;
}
}

@media (max-width: 767.98px) {

    .img-position{
        position: absolute;
                top:200px;
                right:0px;
    }
    .text-position {
                position: absolute;
                top:50px;
                left: 50px;
}
 }
        </style>
        <link rel="stylesheet" href="{{""}}/assets/css/plugins/owl-carousel/owl.carousel.css">
        
@if(Session::get('success1'))
<div class="alert text-white container" style="background: #da1630;">
    {{ Session::get('success1') }}
</div>
@endif

@if(count($slider) > 0)
<main class="main">
  <div class="intro-slider-container mb-0">
    <div class="intro-slider">
        <div style="background-image: url({{"upload/Slider_images/".$slider[0]->back_image}});" class="intro-slide">
            <div class="container intro-content text-center">
                {{-- <h3 class="intro-subtitle text-white">Don’t Miss</h3><!-- End .h3 intro-subtitle --> --}}
                <h1 style="color:#ff5900" class="intro-title">{{$slider[0]->short_title}}</h1><!-- End .intro-title -->
                <div class="intro-text text-white">{{$slider[0]->long_title}}</div><!-- End .intro-text -->
                <a href="{{isset($slider[0]->link) ? url($slider[0]->link) : '#'}}" class="btn btn-primary">Discover NOW</a>
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
              
            
    </div><!-- End .intro-slider owl-carousel owl-theme -->

          
        </div><!-- End .intro-slider-container -->
      </main>
      
       @endif
       

