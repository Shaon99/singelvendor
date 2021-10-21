@extends('admin.layout.master')
@section('title', 'Social Area')
@section('pageTitle') <a href="#">Social Area</a> @endsection
@section('parentPageTitle')<a href="{{route('social.view')}}">Social Area Edit</a> @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>
                    Social Area Edit

                    <a class=" float-right btn btn-success btn-sm" href="{{ route('social.view') }}"><i class="fa fa-list"></i>Social Area</a>
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
                <form class="" action="{{ route('social.update', $social->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="heading" value="{{old('heading', $social->heading)}}" >
                            @error('heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sub_heading">Sub Heading</label>
                            <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" id="sub_heading" value="{{old('sub_heading', $social->sub_heading)}}" >
                            @error('sub_heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="facebook_link">Facebook Link</label>
                            <input type="text" name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" value="{{old('facebook_link', $social->facebook_link)}}" >
                            @error('facebook_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="twitter_link">Twitter Link</label>
                            <input type="text" name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link" value="{{old('twitter_link', $social->twitter_link)}}" >
                            @error('twitter_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instragram_link">Instragram Link</label>
                            <input type="text" name="instragram_link" class="form-control @error('instragram_link') is-invalid @enderror" id="instragram_link" value="{{old('instragram_link', $social->instragram_link)}}" >
                            @error('instragram_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="youtube_link">Youtube Link</label>
                            <input type="text" name="youtube_link" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link" value="{{old('youtube_link', $social->youtube_link)}}" >
                            @error('youtube_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pinterest_link">Pinterest Link</label>
                            <input type="text" name="pinterest_link" class="form-control @error('pinterest_link') is-invalid @enderror" id="pinterest_link" value="{{old('pinterest_link', $social->pinterest_link)}}" >
                            @error('pinterest_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop