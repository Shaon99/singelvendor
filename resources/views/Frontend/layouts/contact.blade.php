@extends('Frontend.layouts.master')

@section('content')


    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li class="active">Contact us </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-area pt-115 pb-120">
        <div class="container">
            <div class="contact-info-wrap-3 pb-85">
                <h3>contact info</h3>




                <div class="row">
                    <div  class="col-lg-4 col-md-4">
                        <div style="background-color:#39B54A;" class=" shadow single-contact-info-3 text-center mb-30">
                            <i style="color:white" class="icon-location-pin "></i>
                            <h4 style="color:white">our address</h4>
                            @if(!empty($contacts))
                                <p style="color:white">{{$contacts->address}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div style="background-color:#39B54A;" class="shadow single-contact-info-3 extra-contact-info text-center mb-30">
                            <ul>
                                @if(!empty($contacts))
                                    <li style="color:white"><i style="color:white" class="icon-screen-smartphone"></i>{{$contacts->mobile_no}}</li>
                                    <li><i style="color:white" class="icon-envelope "></i> <a style="color:white" href="#"> {{$contacts->email}}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div style="background-color:#39B54A;" class="single-contact-info-3 shadow text-center mb-30">
                            <i style="color:white" class="icon-clock "></i>
                            <h4 style="color:white">openning hour</h4>
                            <p style="color:white">Monday - Friday. 9:00am - 5:00pm </p>
                        </div>
                    </div>
                </div>



            </div>
            <div class="get-in-touch-wrap">
                <h3>Get In Touch</h3>
                <div class="contact-from contact-shadow">

                    <form action="{{route('contact')}}" method="post">
                        @csrf
                        <div class="row col-md-12">

                            <div class="row col-md-6">
                                <div class="col-lg-6 col-md-3">
                                    <input name="name" type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6 col-md-3">
                                    <input name="email" type="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <input name="subject" type="text" placeholder="Subject">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-5">
                                    <button class="submit" type="submit">Send Message</button>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div style="width:100%;border:1px solid lightgray" class="shadow"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Rahman%20Mansion+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
