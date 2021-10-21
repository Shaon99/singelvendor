@extends('admin.layout.master')
@section('title', 'Edit Product')
@section('pageTitle') <a href="#">Edit Product</a> @endsection
@section('parentPageTitle') <a href="{{route('products.list')}}">Products</a> @endsection
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Product</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body">
                                    <form class="form-horizontal" action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <!-- Form Name -->
                                        <legend>PRODUCTS</legend>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product_name">PRODUCT NAME</label>
                                            <div class="col-md-3">
                                                <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" value="{{old('name',$product->name)}}" required type="text">
                                            </div>
                                            <label class="col-md-3 control-label" for="product_categorie">PRODUCT CATEGORY</label>
                                            <div class="col-md-3">
                                                <select id="product_categorie" name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @if(isset($categories))
                                                    @foreach($categories as $row)
                                                        @if(isset($product->category))
                                                            @if($row->name == $product->category->name)
                                                                <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                            @endif
                                                        @endif
                                                            <option value="{{$row->id}}">{{$row->name}}</option>

                                                    @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>



                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="sub_categorie">SUB-CATEGORY</label>
                                            <div class="col-md-3">
                                                <select id="sub_categorie" name="sub_category_id" class="form-control">
                                                    <option value="">Select Sub Category</option>
                                                    @if(isset($sub_category))
                                                    @foreach($sub_category as $sub)

                                                        <option {{ $sub->id == $product->sub_category_id ? 'selected':null }} value="{{$sub->id}}">{{$sub->sub_category_name}}
                                                        </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <label class="col-md-3 control-label" for="brand_name">BRAND NAME</label>
                                            <div class="col-md-3">
                                                <select id="brand_name" name="brand_id" class="form-control">
                                                    <option value="">Select Brand Name</option>
                                                    @if(isset($brands))
                                                    @foreach($brands as $row)
                                                        @if(isset($product->brand->name))
                                                        @if($row->name == $product->brand->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @endif
                                                        @endif
                                                        <option value="{{$row->id}}">{{$row->name}}</option>

                                                    @endforeach
                                                    @endif


                                                </select>
                                            </div>
                                        </div>



                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="tag">SELECT TAG</label>
                                            <div class="col-md-3">
                                                <select id="tag" name="tag_id" class="form-control">
                                                    <option value="">Select Tag</option>
                                                    @if(isset($tags) && isset($product->tag->name))
                                                    @foreach($tags as $row)
                                                        @if( !empty($product->tag->name) && $row->name == $product->tag->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
{{--                                            <label class="col-md-3 control-label" for="colorMultiSelect">SELECT COLORS</label>--}}
{{--                                            <div class="col-md-3">-->--}}
{{--                                                <select id="colorMultiSelect" name="color_id[]" class="form-control" multiple="multiple">--}}
{{--                                                    @foreach($colors as $row)-->--}}
{{--                                                    <option value="{{$row->id}}">{{$row->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                        </div>



                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product_size">SELECT SIZES</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="size_id[]" multiple="multiple">
                                                    @foreach($sizes as $row)
                                                        <option {{ in_array($row->id, $product->sizes->pluck('id')->toArray()) ? 'selected' : ''  }} value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-md-3 control-label" for="selling_price">SELLING PRICE</label>
                                            <div class="col-md-3">
                                                <input id="selling_price" name="price" placeholder="SELLING PRICE" class="form-control input-md" value="{{old('price',$product->price)}}" required type="number">

                                            </div>
                                        </div>



                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="buying_price">BUYING PRICE</label>
                                            <div class="col-md-3">
                                                <input id="buying_price" name="buying_price" placeholder="BUYING PRICE" class="form-control input-md" value="{{old('buying_price',$product->buying_price)}}" required type="number">

                                            </div>
                                            <label class="col-md-3 control-label" for="stock_available">STOCK</label>
                                            <div class="col-md-3">
                                                <input id="stock_available" name="stock" placeholder="STOCK AVAILABLE" class="form-control input-md" value="{{old('stock',$product->stock)}}" required type="number">

                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="stock_warning">STOCK WARNING</label>
                                            <div class="col-md-3">
                                                <input id="stock_warning" name="stock_warning" placeholder="STOCK WARNING" class="form-control input-md" value="{{old('stock_warning',$product->stock_warning)}}" required type="number">

                                            </div>
                                        </div>

                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="long_description">LONG DESCRIPTION</label>
                                            <div class="col-md-3">
                                                <textarea style="height:100px" class="form-control" id="long_description" name="long_desc">{{old('long_desc',$product->long_desc)}}</textarea>
                                            </div>
                                            <label class="col-md-3 control-label" for="short_description">SHORT DESCRIPTION</label>
                                            <div class="col-md-3">
                                                <textarea style="height:100px" class="form-control" id="short_description" name="short_desc" required>{{old('short_desc',$product->short_desc)}}</textarea>
                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group col-md-12">
                                            <input  class="control-label" type="checkbox" value="1" name="promo" id="add_promotion" onclick="showPromo()">
                                            <label class="control-label" for="add_promotion">
                                                ADD PROMOTION
                                            </label>
                                        </div>
                                        <div class="form-group col-md-12" id="promo_price" style="display: none">
                                            <label class="col-md-2 control-label" for="promo_btn">PROMOTIONAL PRICE</label>
                                            <div id="promo-price">
                                                <div class="col-md-2">
                                                    <input id="promo_btn" name="promo_price" placeholder="PROMOTION PRICE" class="form-control input-md" value="{{old('promo_price',$product->promo_price)}}" type="number">

                                                </div>
                                                <label class="col-md-2 control-label" for="add_promotion">
                                                    START DATE :
                                                </label>
                                                <input  class="col-md-2 control-label" name="start_date" type="date" value="{{old('start_date',$product->start_date)}}" id="add_promotion">


                                                <label class="col-md-2 control-label" for="add_promotion">
                                                    END DATE :
                                                </label>
                                                <input  class="col-md-2 control-label" name="end_date" type="date" value="{{old('end_date',$product->end_date)}}" id="add_promotion">
                                            </div>

                                        </div>
                                        <script>

                                            function showPromo()
                                            {
                                                var checkbox = document.getElementById('add_promotion');
                                                var promo_section = document.getElementById('promo_price');
                                                if(checkbox.checked == true){
                                                    promo_section.style.display = "flex";
                                                }else{
                                                    promo_section.style.display = "none"
                                                }
                                            }

                                        </script>


                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product_image">PRODUCT IMAGE</label>
                                            <div class="col-md-3">
                                                <input type="file" class="form-control" id="product_image" name="image" value="">
                                            </div>

                                        </div>
                                        <input type="text" name="old_image" value="{{$product->image}}" hidden>

                                        <div class="form-group" id="product_subImage">
                                            <div class="subImageSection">
                                                <label class="col-md-3 control-label" for="long_description">SUB IMAGE</label>
                                                <div id="i" class="col-md-3">
                                                    <input type="file" class="form-control" id="long_description" name="images[]">
                                                </div>

                                                    <div class="col-md-2">
                                                        <span id="plusBtn"><i style="font-size:20px" class="fa fa-plus"></i></span>
                                                    </div>
                                            </div>

                                        </div>

                                        <!-- Button -->
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <button id="singlebutton" name="singlebutton" class="btn btn-success">Upload</button>
                                            </div>
                                        </div>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop

@section('page-styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.min.css')}}">
    <style>
        .promotion{
            display: block;
        }
    </style>
@endsection

@section('page-script')
    <script src="{{asset('/js/bootstrap-multiselect.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(function(){
                $('#colorMultiSelect').multiselect();
            });
            $(function(){
                $('#sizeMultiSelect').multiselect();
            });
        })
    </script>
<script>
    $(document).ready(function () {
    $('#plusBtn').on('click',function (e) {

        $('#i').append(`

        <input type="file" class="form-control mt-2" id="long_description" name="images[]">


        `);
    })

});
</script>
@endsection
