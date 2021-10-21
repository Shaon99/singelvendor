@extends('admin.layout.master')
@section('title', 'About Service')
@section('pageTitle') <a href="{{route('service.view')}}">About Service</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card" style="background: aliceblue;">
                <div class="header">
                    <h6> About Service Area</h6>
                    @if(empty($service))
                        <a class=" btn btn-primary m-b-15" href="{{ route('service.add') }}"><i class="fa fa-plus-circle"></i> Add Service Area</a>
                    @endif

                    @if(session()->has('success_msg'))
                    @section('page-script')
                        $(document).ready(function(){
                        toastr.options.timeOut = "3500";
                        toastr.options.closeButton = true;
                        toastr.options.positionClass = 'toast-top-right';
                        toastr['success']('{{session('success_msg')}}');
                        });
                    @endsection
                    @endif
                </div>


                @if(!empty($service))
                    <div class="body">

                        <div class="service-area pb-115">
                            <div class="container card">
                                <div class=" body service-wrap-border service-wrap-padding-3">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-border-1">
                                            <div class="single-service-wrap-2 mb-30">
                                                @if(!empty($service->title1))
                                                    <div class="service-icon-2 icon-purple">
                                                        <i class="icon-puzzle-piece"></i>
                                                    </div>
                                                @endif
                                                <div class="service-content-2">
                                                    <h3>{{ $service->title1 }}</h3>
                                                    <p>{{ $service->text1 }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                                            <div class="single-service-wrap-2 mb-30">
                                                @if(!empty($service->title2))
                                                    <div class="service-icon-2 icon-purple">
                                                        <i class="icon-life-ring"></i>
                                                    </div>
                                                @endif
                                                <div class="service-content-2">
                                                    <h3>{{ $service->title2 }}</h3>
                                                    <p>{{ $service->text2 }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-border-1">
                                            <div class="single-service-wrap-2 mb-30">
                                                @if(!empty($service->title3))
                                                    <div class="service-icon-2 icon-purple">
                                                        <i class="icon-heart-o"></i>
                                                    </div>
                                                @endif
                                                <div class="service-content-2">
                                                    <h3>{{ $service->title3 }}</h3>
                                                    <p>{{ $service->text3 }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif

                @if(!empty($service))
                    <div class="col-sm-offset-2 col-sm-10 mb-3 text-center">
                        <a href="{{route('about-service.edit', $service->id)}}" class="btn btn-primary"
                           data-toggle="tooltip" data-original-title="Edit"> Edit </a>

                    </div>
                    <form id="delete-form" method="POST"  class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                @endif
            </div>
        </div>
    </div>
@stop
