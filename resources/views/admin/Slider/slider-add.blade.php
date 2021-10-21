@extends('admin.layout.master')
@section('title', 'Add Slider')
@section('pageTitle') <a href="#">Add Slider</a> @endsection
@section('parentPageTitle') <a href="{{route('slider.view')}}">All sliders</a> @endsection


@section('content')

<div class="card">
    <div class="card-header">
      <h6>
          @if (isset($editdata))
              Edit Slider
              @else
                 Add Slider
          @endif

        <a class=" float-right btn btn-success btn-sm" href="{{ route('slider.view') }}"><i class="fa fa-list"></i> Slider List</a>
      </h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ (@$editdata)? route('slider.update',$editdata->id): route('slider.store') }}"  id="myform" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="short_title">Short Title</label>
                    <input type="text" name="short_title" class="form-control" id="short_title" value="{{ @$editdata->short_title }}">

                </div>

                <div class="form-group col-md-6">
                    <label for="long_title">Long Title</label>
                    <input type="text" name="long_title" class="form-control" id="long_title"  value="{{ @$editdata->long_title }}">

                </div>

                <div class="form-group col-md-12">
                    <label for="link">Product Link</label>
                    <input type="url" name="link" class="form-control" id="link" value="{{ @$editdata->link }}">
                </div>
                
                @if(isset($editdata->back_image))
                <div class="form-group col-md-6">
                    <label form="bg-image">Background Image</label>
                    <img style="height: 100px; width: 100px" src="{{asset('upload/Slider_images/'.@$editdata->back_image)}}" alt="">
                </div>
                @endif
                
                @if(isset($editdata->pro_image))
                <div class="form-group col-md-6">
                    <label form="bg-image">Product Image</label>
                    <img style="height: 100px; width: 100px" src="{{asset('upload/Slider_images/'.@$editdata->pro_image)}}" alt="">
                </div>
                @endif
                
                <div class="form-group col-md-4">
                    <label for="image">Background Image</label>
                    <input type="file" name="back_image" class="form-control" id="back_image">

                </div>
                <div class="form-group col-md-4">
                    <label for="image">Product Image</label>
                    <input type="file" name="pro_image" class="form-control" id="pro_image">

                </div>
                <div class="form-group col-md-6" style="padding-top: 30px">
                    <input type="submit" value="{{ (@$editdata)? "Update": "Submit" }}" class="btn btn-primary">

                </div>

            </div>

        </form>
      </div>

    </div>

@if(session()->has('success_msg'))
@section('page-script')
$(document).ready(function(){
toastr.options.timeOut = "false";
toastr.options.closeButton = true;
toastr.options.positionClass = 'toast-top-right';
toastr['success']('{{session('success_msg')}}');
});
@endsection
@endif


@stop

@section('page-script')

$(function() {
// validation needs name of the element
$('#food').multiselect();

// initialize after multiselect
$('#basic-form').parsley();
});

@stop