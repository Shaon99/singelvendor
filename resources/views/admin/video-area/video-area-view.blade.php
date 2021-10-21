@extends('admin.layout.master')
@section('title', 'Video Area')
@section('pageTitle') <a href="#">Video Area</a> @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>
                    Video Area

                <a class=" float-right btn btn-success btn-sm" href="{{ route('video-area.edit', 1) }}"><i class="fa fa-list"></i>Edit Video Area</a>
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
                        <label for="sub_heading">Sub Heading 1</label>
                        <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" id="sub_heading" value="{{old('sub_heading', $video->sub_heading)}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="heading">Heading</label>
                        <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="heading" value="{{old('heading', $video->heading)}}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="video_link">Video Link</label>
                        <input type="text" name="video_link" class="form-control @error('video_link') is-invalid @enderror" id="video_link" value="{{old('video_link', $video->video_link)}}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="video_bg_image">Video Background</label>
                        <img src="{{ asset('upload/video_bg/' . $video->video_bg_image) }}" alt="Video Image" class="d-block mb-3" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop