@extends('admin.layout.master')
@section('title', 'featured_area Area')
@section('pageTitle') <a href="{{ route('featured-area.index') }}">Featured Area</a> @endsection
@section('parentPageTitle')<a href="{{route('featured-area.edit', $featured_area->id)}}">Featured Area Edit</a> @endsection

@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h6>
                        Featured Area Edit

                        <a class=" float-right btn btn-success btn-sm" href="{{ route('featured-area.index') }}"><i class="fa fa-list"></i>Featured Area</a>
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
                    <form class="" action="{{ route('featured-area.update', $featured_area->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="heading">Heading</label>
                                <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="title1" value="{{old('heading', $featured_area->heading)}}">
                                @error('heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sub_heading">Sub Heading</label>
                                <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" id="title1" value="{{old('sub_heading', $featured_area->sub_heading)}}">
                                @error('sub_heading')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_1">Product 1</label>

                                <select name="product_1" id="product_1" class="form-control">
                                    <option value="">Select Product</option>
                                    @foreach(\App\Model\product::all() as $product)
                                        <option {{ old('product_1', $featured_area->product_1) == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('product_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_2">Product 2</label>

                                <select name="product_2" id="product_2" class="form-control">
                                    <option value="">Select Product</option>
                                    @foreach(\App\Model\product::all() as $product)
                                        <option {{ old('product_2', $featured_area->product_2) == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('product_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="product_3">Product 3</label>

                                <select name="product_3" id="product_3" class="form-control">
                                    <option value="">Select Product</option>
                                    @foreach(\App\Model\product::all() as $product)
                                        <option {{ old('product_2', $featured_area->product_2) == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('product_3')
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
