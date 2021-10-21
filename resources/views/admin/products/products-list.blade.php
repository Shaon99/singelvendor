@extends('admin.layout.master')
@section('title', 'Products')
@section('pageTitle') <a href="{{route('products.list')}}">Products</a> @endsection
@section('parentPageTitle', '')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="row clearfix border">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Product List</h2>
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
                                    <a class=" btn btn-primary m-b-15" href="{{route('products.create')}}"><i class="fa fa-plus-circle"></i> Add Product</a>
                                    <div class="table-responsive">
                                        <table  id="myTable" class="table table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Promo Price</th>
                                              
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Promo Price</th>
                                                
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>
                                                        @if(strlen($product->name) > 30)
                                                            {{substr($product->name,0,25) . ' ...'}}
                                                        @else
                                                            {{$product->name}}
                                                        @endif
                                                    </td>
                                                    <td>{{isset($product->category->name) ? $product->category->name : ''}}</td>
                                                    <td>{{isset($product->brand) ? $product->brand->name : ''}}</td>
                                                    <td>{{$product->price}} Tk</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <img style="width: 100px; height: 120px" src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                                    </td>
                                                    <td>{{$product->promo_price}}</td>
                                                
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('product.edit',$product->id)}}" class="editLink" data-toggle="tooltip" title="Edit Product!">
                                                            <button class="btn btn-success btn-sm btn-icon  on-default m-r-5 button-edit editBtn"><i class="icon-pencil" aria-hidden="true"></i></button>
                                                        </a>
                                                        <form action="{{route('product.destroy',$product->id)}}" class="deleteForm" onsubmit="return confirm('Are you sure want to delete this product?')" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm btn-icon on-default button-remove deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                        <button data-id="{{$product->id}}" class="btn btn-success btn-sm btn-icon ml-1 product-view-btn"
                                                                    data-toggle="modal" data-target="#product-details"><i class="icon-eye" aria-hidden="true"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
     {{--Modal--}}

    <div class="modal fade bd-example-modal-lg" id="product-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container p-4 border shadow">
                    <div class="row border">
                            <div class="col-12">
                                <h3 class="text-center">Product Overview</h3>
                            </div>
                        <div class="col-6">
                            <p>Product Name: <b><span id="product-name"></span></b></p>
                            <p>Product Sub-Category: <b><span id="sub-category"></span></b></p>
                            <div id="tags">
                                <p>Product Tags: </p>
                                <ul id="tag">

                                </ul>
                            </div>
                            <div id="promo-section">
                            <p>Promo Price: <b><span id="promo-price"></span></b></p>
                            <p style="margin-top: -13px"><small>Start Date: <b><span id="start-date"></span></b></small></p>
                            <p style="margin-top: -13px"><small>End Date: <b><span id="end-date"></span></b></small></p>
                            </div>

                            <p ><b><span>Short Description</span></b></p>
                            <div id="short-description" class="border mb-2">

                            </div>

                            <p >
                                <b>Product Image:</b><br>
                                <img width="150px" height="150px" id="product-image" src="" alt="">
                            </p>
                            <p ><b>Sub Images:</b> </p>
                            <div class="row" id="sub-images">

                            </div>
                        </div>
                        <div class="col-6">
                            <p >Product Category: <b><span id="category"></span></b></p>
                            <p >Brand Name: <b><span id="brand"></span></b></p>
                            <p >Selling Price: <b><span id="selling-price"></span>Tk.</b></p>
                            <p >Buying Price: <b><span id="buying-price"></span>Tk.</b></p>
                            <p >Stock Available: <b><span id="stock"></span></b></p>

                            <p ><b><span>Long Description</span></b></p>
                            <div id="long-description" class="border" style="">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{--Modal--}}
    <script >
            $('.product-view-btn').on('click',function () {
                 $('#sub-images').html('');

                id = $(this).attr('data-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/admin/products/quick-view',
                    data: {id: id},
                    success: function (data) {
                        console.log(data);
                        $('#product-name').text(data.name);
                         if (data.category != null){
                            $('#category').text(data.category.name);
                        }
                        
                        if (data.sub_category != null){
                            $('#sub-category').text(data.sub_category.sub_category_name);
                        }
                        if (data.brand != null){
                            $('#brand').text(data.brand.name);
                        }
                        $('#selling-price').text(data.price);
                        $('#buying-price').text(data.buying_price);
                        $('#stock').text(data.stock);
                        if (data.promo_price != null){
                            $('#promo-price').text(data.promo_price);
                            $('#start-date').text(data.start_date);
                            $('#end-date').text(data.end_date);
                        }else{
                            $('#promo-price').text("Not Added");
                            $('#start-date').text('');
                            $('#end-date').text('');
                        }
                        $('#short-description').text(data.short_desc);
                        $('#long-description').text(data.long_desc);
                        $('#product-image').attr('src','/upload/products_images/'+data.image);
                        if (data.sub_images.length > 0){

                            data.sub_images.forEach((image) => {
                                $('#sub-images').append(`
                                    <div class="col">
                                    <img width="80px" height="80px" src="/upload/products_images/sub_images/${image.image}" alt="">
                                </div>
                                `);
                            })
                        }else{
                            $('#sub-images').append("<p>Not available</p>");
                        }

                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            });
    </script>

@stop

@section('page-styles')
    <style>
        #product-details p{
            font-size: 18px;
        }
        #short-description{
            margin-top: -13px;
        }
        #long-description{
            margin-top: -13px;
        }
        #sub-images{
            margin-top: -13px;
        }
        #promo-section{
            border: 1px solid lightgrey;
        }
    </style>
@endsection



