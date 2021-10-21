@extends('admin.layout.master')
@section('title', 'Advertise Area')
@section('pageTitle') <a href="#">Featured Area</a> @endsection

@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h6>
                        Featured Area

                        <a class=" float-right btn btn-success btn-sm" href="{{ route('featured-area.edit', 1) }}"><i class="fa fa-list"></i>Edit Featured Area</a>
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
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="title1" value="{{old('heading', $featured_area->heading)}}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sub_heading">Sub Heading</label>
                            <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" id="title1" value="{{old('sub_heading', $featured_area->sub_heading)}}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="product_1">Product 1</label>
                            @php
                                $product_1 = \App\Model\product::find($featured_area->product_1);
                            @endphp
                            <img class="d-block" src="{{ asset('upload/products_images/') . $product_1->image }}" alt="product image">
                            <p class="mb-0">{{ $product_1->name }}</p>
                            <p>{{ $product_1->price }} TK</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="product_1">Product 2</label>
                            @php
                                $product_2 = \App\Model\product::find($featured_area->product_2);
                            @endphp
                            <img class="d-block" src="{{ asset('upload/products_images/') . $product_2->image }}" alt="product image">
                            <p class="mb-0">{{ $product_2->name }}</p>
                            <p>{{ $product_2->price }} TK</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="product_3">Product 3</label>
                            @php
                                $product_3 = \App\Model\product::find($featured_area->product_3);
                            @endphp
                            <img class="d-block" src="{{ asset('upload/products_images/') . $product_3->image }}" alt="product image">
                            <p class="mb-0">{{ $product_3->name }}</p>
                            <p>{{ $product_3->price }} TK</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
