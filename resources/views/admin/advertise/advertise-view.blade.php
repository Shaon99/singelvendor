@extends('admin.layout.master')
@section('title', 'Advertise Area')
@section('pageTitle') <a href="#">Advertise Area</a> @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>
                    Advertise Area

                <a class=" float-right btn btn-success btn-sm" href="{{ route('advertise.edit', 1) }}"><i class="fa fa-list"></i>Edit Advertise Area</a>
                </h6>

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

            <div class="body">    
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sub_heading_1">Sub Heading 1</label>
                        <input type="text" name="sub_heading_1" class="form-control @error('sub_heading_1') is-invalid @enderror" id="title1" value="{{old('sub_heading_1', $advertise->sub_heading_1)}}" readonly>
                        @error('sub_heading_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="heading_1">Heading 1</label>
                        <input type="text" name="heading_1" class="form-control @error('heading_1') is-invalid @enderror" id="heading_1" value="{{old('heading_1', $advertise->heading_1)}}" readonly>
                        @error('heading_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_text_1">Button Text 1</label>
                        <input type="text" name="button_text_1" class="form-control @error('button_text_1') is-invalid @enderror" id="button_text_1" value="{{old('button_text_1', $advertise->button_text_1)}}" readonly>
                        @error('button_text_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_link_1">Button Link 1</label>
                        <input type="text" name="button_link_1" class="form-control @error('button_link_1') is-invalid @enderror" id="button_link_1" value="{{old('button_link_1', $advertise->button_link_1)}}" readonly>
                        @error('button_link_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="ad_image_1">AD Image 1</label>
                        <img src="{{ asset('upload/advertise_images/' . $advertise->ad_image_1) }}" alt="Ad 1" class="d-block mb-3" width="200">
                    </div>
                </div>

                <hr>

                <!--AD 2-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sub_heading_1">Sub Heading 2</label>
                        <input type="text" name="sub_heading_2" class="form-control @error('sub_heading_2') is-invalid @enderror" id="sub_heading_2" value="{{old('sub_heading_2', $advertise->button_link_3)}}" readonly>
                        @error('sub_heading_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="heading_1">Heading 2</label>
                        <input type="text" name="heading_2" class="form-control @error('heading_2') is-invalid @enderror" id="heading_2" value="{{old('heading_2', $advertise->heading_2)}}" readonly>
                        @error('heading_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_text_1">Button Text 2</label>
                        <input type="text" name="button_text_2" class="form-control @error('button_text_2') is-invalid @enderror" id="button_text_2" value="{{old('button_text_2', $advertise->button_text_2)}}" readonly>
                        @error('button_text_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_link_1">Button Link 2</label>
                        <input type="text" name="button_link_2" class="form-control @error('button_link_2') is-invalid @enderror" id="button_link_2" value="{{old('button_link_2', $advertise->button_link_3)}}" readonly>
                        @error('button_link_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="ad_image_2">AD Image 2</label>
                        <img src="{{ asset('upload/advertise_images/' . $advertise->ad_image_2) }}" alt="Ad 2" class="d-block mb-3" width="200">
                    </div>
                </div>

                <hr>

                <!--AD 3-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sub_heading_1">Sub Heading 3</label>
                        <input type="text" name="sub_heading_3" class="form-control @error('sub_heading_3') is-invalid @enderror" id="sub_heading_3" value="{{old('sub_heading_3', $advertise->sub_heading_3)}}" readonly>
                        @error('sub_heading_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="heading_3">Heading 3</label>
                        <input type="text" name="heading_3" class="form-control @error('heading_3') is-invalid @enderror" id="heading_3" value="{{old('heading_3', $advertise->heading_3)}}" readonly>
                        @error('heading_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_text_3">Button Text 3</label>
                        <input type="text" name="button_text_3" class="form-control @error('button_text_3') is-invalid @enderror" id="button_text_3" value="{{old('button_text_3', $advertise->button_text_3)}}" readonly>
                        @error('button_text_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="button_link_3">Button Link 3</label>
                        <input type="text" name="button_link_3" class="form-control @error('button_link_3') is-invalid @enderror" id="button_link_3" value="{{old('button_link_3', $advertise->button_link_3)}}" readonly>
                        @error('button_link_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="ad_image_3">AD Image 3</label>
                        <img src="{{ asset('upload/advertise_images/' . $advertise->ad_image_3) }}" alt="Ad 3" class="d-block mb-3" width="200">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop