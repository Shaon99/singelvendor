@extends('Frontend.layouts.master')

@section('content')

<div class="breadcrumb-area bg-gray text-center" style="padding: 40px 0;">
    <style>

        h1 {
          color: #39b54a;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      .i {
        color: #39b54a;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .cards {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }

      .animation-ctn{
  text-align:center;
  margin-top:3em;
}

	@-webkit-keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 200px
    }
}

@-ms-keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 200px
    }
}

@keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 0px
    }
}

@-webkit-keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 480px

    }

    100% {
        stroke-dashoffset: 960px;

    }
}

@-ms-keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 240px
    }

    100% {
        stroke-dashoffset: 480px
    }
}

@keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 480px
    }

    100% {
        stroke-dashoffset: 960px
    }
}

@keyframes colored-circle {
    0% {
        opacity:0
    }

    100% {
        opacity:100
    }
}

/ other styles /
/* .svg svg {
    display: none
}
 */
.inlinesvg .svg svg {
    display: inline
}

/* .svg img {
    display: none
} */

.icon--order-success svg polyline {
    -webkit-animation: checkmark 0.55s ease-in-out 0.7s backwards;
    animation: checkmark 0.55s ease-in-out 0.7s backwards
}

.icon--order-success svg circle {
    -webkit-animation: checkmark-circle 1.5s ease-in-out backwards;
    animation: checkmark-circle 1.5s ease-in-out backwards;
}
.icon--order-success svg circle#colored {
    -webkit-animation: colored-circle 1.5s ease-in-out 0.7s backwards;
    animation: colored-circle 1.5s ease-in-out 0.7s backwards;
}
.order-track{
    color:#39b54a;
}


   </style>
    <body>
      <div class="cards">
      <p style="letter-spacing: 3px; padding:0%;">Thank You For Shopping!</p>

      <div class="animation-ctn">
        <div class="icon icon--order-success svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">
              <g fill="none" stroke="#22AE73" stroke-width="2">
                <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/>
              </g>
            </svg>
          </div>
  </div><br>

      {{-- <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="i checkmark">✓</i>
      </div> --}}
        <h1>Order Confirmed</h1>
        <br>
        <p>Your Order Code <Strong style="letter-spacing: 3px; color:#39b54a;">{{$notify}}</Strong></p>
        <br>
        <a  class="mt-3 order-track"  href="/user/userAccount"> <u>Click Here To Check Your Order Details</u></a>

      </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    function auto_print() {

    }
    setTimeout(auto_print, 1000);
    if (window.history.replaceState) {
        window.history.replaceState(null, null, '/');
    }

</script>

@endsection