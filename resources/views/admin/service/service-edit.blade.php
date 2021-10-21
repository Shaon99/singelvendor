@extends('admin.layout.master')
@section('title', 'Service Area')
@section('pageTitle') <a href="#">Service Area Edit</a> @endsection
@section('parentPageTitle')<a href="{{route('service.view')}}">Service Area</a> @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>
                    Service Area Edit

                <a class=" float-right btn btn-success btn-sm" href="{{ route('service.view') }}"><i class="fa fa-list"></i>Service Area</a>
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
                <form class="" action="{{ route('service.update', $service->id) }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="title1">Title 1</label>
                            <input type="text" name="title1" class="form-control @error('title1') is-invalid @enderror" id="title1" value="{{old('title1', $service->title1)}}" >
                            @error('title1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="text1">Text 1</label>
                            <input type="text" name="text1" class="form-control @error('text1') is-invalid @enderror" id="text1" value="{{old('text1', $service->text1)}}" >
                            @error('text1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="title2">Title 2</label>
                            <input type="text" name="title2" class="form-control @error('title2') is-invalid @enderror" id="title2" value="{{old('title2', $service->title2)}}" >
                            @error('title2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="text2">Text 2</label>
                            <input type="text" name="text2" class="form-control @error('text2') is-invalid @enderror" id="text2" value="{{old('text2', $service->text2)}}" >
                            @error('text2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="title3">Title 3</label>
                            <input type="text" name="title3" class="form-control @error('title3') is-invalid @enderror" id="title3" value="{{old('title3', $service->title3)}}" >
                            @error('title3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="text3">Text 3</label>
                            <input type="text" name="text3" class="form-control @error('text3') is-invalid @enderror" id="text3" value="{{old('text3', $service->text3)}}" >
                            @error('text3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="title4">Title 4</label>
                            <input type="text" name="title4" class="form-control @error('title4') is-invalid @enderror" id="title4" value="{{old('title4', $service->title4)}}" >
                            @error('title4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="text4">Text 4</label>
                            <input type="text" name="text4" class="form-control @error('text4') is-invalid @enderror" id="text4" value="{{old('text4', $service->text4)}}" >
                            @error('text4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop