@extends('admin.layout.master')
@section('title', 'Header Settings')
@section('pageTitle') <a href="{{route('header.view')}}"> Header Settings </a> @endsection
@section('parentPageTitle', '')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                {{-- @if(!isset($header))
                <a class=" btn btn-primary m-b-15" href="{{ route('header.add') }}"><i class="fa fa-plus-circle"></i> Add Header Properties</a>
                @else
                <a class=" btn btn-primary m-b-15" href="{{ route('header.edit', $header->id) }}"><i class="fa fa-plus-circle"></i> Edit Header Properties</a>
                @endif --}}

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
                @if(!empty($header))
                    <form class="form-row" action="{{ route('header.update', $header->id) }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title',$header->title)}}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="top_heading">Top Heading</label>
                        <input type="text" name="top_heading" class="form-control @error('top_heading') is-invalid @enderror" id="top_heading" value="{{old('top_heading',$header->top_heading)}}" >
                        @error('top_heading')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lang">Language</label>
                        <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang" value="{{old('lang',$header->lang)}}" >
                        @error('lang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="curr">Currency</label>
                        <input type="text" name="curr" class="form-control @error('curr') is-invalid @enderror" id="curr" value="{{old('curr',$header->curr)}}" >
                        @error('curr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bannar_offer">Bannar Offer</label>
                        <input type="text" name="bannar_offer" class="form-control @error('bannar_offer') is-invalid @enderror" id="bannar_offer" value="{{old('bannar_offer',$header->bannar_offer)}}" >
                        @error('bannar_offer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bannar_text">Bannar Text</label>
                        <input type="text" name="bannar_text" class="form-control @error('bannar_text') is-invalid @enderror" id="bannar_text" value="{{old('bannar_text',$header->bannar_text)}}" >
                        @error('bannar_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>

                        <div hidden> {{$route = route('header.delete',$header->id)}}</div>
                        <a href="{{ route('header.delete',$header->id) }}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove"
                            onclick="event.preventDefault();
                            document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                            confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">
                            Delete
                        </a>

                    </div>
                    </form>
            
                @else
                    <form class="form-row" action="{{ route('header.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" >
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="top_heading">Top Heading</label>
                        <input type="text" name="top_heading" class="form-control @error('top_heading') is-invalid @enderror" id="top_heading" value="{{old('top_heading')}}" >
                        @error('top_heading')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lang">Language</label>
                        <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang" value="{{old('lang')}}" >
                        @error('lang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="curr">Currency</label>
                        <input type="text" name="curr" class="form-control @error('curr') is-invalid @enderror" id="curr" value="{{old('curr')}}" >
                        @error('curr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bannar_offer">Bannar Offer</label>
                        <input type="text" name="bannar_offer" class="form-control @error('bannar_offer') is-invalid @enderror" id="bannar_offer" value="{{old('bannar_offer')}}" >
                        @error('bannar_offer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bannar_text">Bannar Text</label>
                        <input type="text" name="bannar_text" class="form-control @error('bannar_text') is-invalid @enderror" id="bannar_text" value="{{old('bannar_text')}}" >
                        @error('bannar_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                @endif
            </div>
            <form id="delete-form" method="POST"  class="d-none">
                    @csrf
                    @method('DELETE')
            </form>
        </div>
    </div>
</div>
@stop