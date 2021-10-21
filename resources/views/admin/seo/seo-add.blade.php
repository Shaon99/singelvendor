@extends('admin.layout.master')
@section('title', 'Add SEO & Google Analytics')
@section('parentPageTitle') <a href="/admin/seo/view">SEO & Google Analytics</a> @endsection
@section('pageTitle') <a href="#">SEO & Google Analytics</a> @endsection


@section('content')
<div class="row clearfix card">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card-body">

        <form class="form-horizontal" action="{{url("admin/seo/store")}}" method="post">
            @csrf
            <div class="form-group col-md-6">
                <label for="header">Header</label>
                <input type="text" name="header" class="form-control @error('header') is-invalid @enderror" id="header" value="{{old('header')}}" >
                @error('header')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="footer">Footer</label>
                <input type="text" name="footer" class="form-control @error('footer') is-invalid @enderror" id="footer" value="{{old('footer')}}" >
                @error('footer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@stop
