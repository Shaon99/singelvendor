    @extends('admin.layout.master')
    @section('title', 'Add Product')
    @section('pageTitle') <a href="{{route('products.create')}}">Add Product</a> @endsection
    @section('parentPageTitle') <a href="{{route('products.list')}}">Products</a> @endsection
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    @section('content')

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">
                <div class="card planned_task">
                    <div class="header">
                        <h2>Add Product</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="body">
                                        <form class="form-horizontal" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <!-- Form Name -->
                                            <legend>PRODUCTS</legend>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="product_name">PRODUCT NAME</label>
                                                <div class="col-md-3">
                                                    <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required type="text">
                                                </div>
                                                <label class="col-md-3 control-label" for="product_categorie">PRODUCT CATEGORY</label>
                                                <div class="col-md-3">
                                                <select id="product_categorie" name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="sub_categorie">SUB-CATEGORY</label>
                                                <div class="col-md-3">
                                                <select id="sub_categorie" name="sub_category_id" class="form-control">
                                                    <option value="">Select Sub Category</option>
                                                    @foreach($sub_category as $sub)
                                                        <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <label class="col-md-3 control-label" for="brand_name">BRAND NAME</label>
                                            <div class="col-md-3">
                                                <select id="brand_name" name="brand_id" class="form-control">
                                                    <option value="">Select Brand name</option>
                                                        @foreach($brands as $row)
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="tag">SELECT TAG</label>
                                                <div class="col-md-3">
                                                <select id="tag" name="tag_id" class="form-control">
                                                    <option value="">Select Tags</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
{{--                                                <label class="col-md-3 control-label" for="colorMultiSelect">SELECT COLORS</label>--}}
{{--                                                <div class="col-md-3">-->--}}
{{--                                                    <select id="colorMultiSelect" name="color_id[]" class="form-control" multiple="multiple">--}}
{{--                                                    @foreach($colors as $row)-->--}}
{{--                                                    <option value="{{$row->id}}">{{$row->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                    </select>--}}
{{--                                                 </div>--}}
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                               <label class="col-md-3 control-label" for="product_size">SELECT SIZES</label>
                                               <div class="col-md-3">
                                                <select id="sizeMultiSelect" class="form-control" name="size_id[]" multiple="multiple">
                                                @foreach($sizes as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                                </select>
                                               </div>
                                                <label class="col-md-3 control-label" for="selling_price">SELLING PRICE</label>
                                                <div class="col-md-3">
                                                    <input id="selling_price" name="price" placeholder="SELLING PRICE" class="form-control input-md" required type="number">
                                                </div>
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="buying_price">BUYING PRICE</label>
                                                <div class="col-md-3">
                                                    <input id="buying_price" name="buying_price" placeholder="BUYING PRICE" class="form-control input-md" required type="number">

                                                </div>
                                                <label class="col-md-3 control-label" for="stock_available">STOCK</label>
                                                <div class="col-md-3">
                                                    <input id="stock_available" name="stock" placeholder="STOCK AVAILABLE" class="form-control input-md" required type="number">

                                                </div>
                                            </div>



                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="stock_warning">STOCK WARNING</label>
                                                <div class="col-md-3">
                                                    <input id="stock_warning" name="stock_warning" placeholder="STOCK WARNING" class="form-control input-md" required type="number">

                                                </div>
                                            </div>




                                            <!-- Textarea -->
                                            <div class="form-group">
                                            <label class="col-md-3 control-label" for="long_description">LONG DESCRIPTION</label>
                                            <div class="col-md-3">
                                                <textarea style="height:100px" class="form-control" id="long_description" name="long_desc"></textarea>
                                            </div>
                                            <label class="col-md-3 control-label" for="short_description">SHORT DESCRIPTION</label>
                                            <div class="col-md-3">
                                                <textarea style="height:100px" class="form-control" id="short_description" name="short_desc" required></textarea>
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
                                                    <input id="promo_btn" name="promo_price" placeholder="PROMOTION PRICE" class="form-control input-md" type="number">

                                                </div>
                                                <label class="col-md-2 control-label" for="add_promotion">
                                                    START DATE :
                                                </label>
                                                <input  class="col-md-2 control-label" name="start_date" type="date" value="" id="add_promotion">


                                                <label class="col-md-2 control-label" for="add_promotion">
                                                    END DATE :
                                                </label>
                                                <input  class="col-md-2 control-label" name="end_date" type="date" value="" id="add_promotion">
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
                                                <input type="file" class="form-control" id="product_image" name="image" required>
                                                </div>

                                            </div>

                                            <div class="form-group" id="product_img">
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
