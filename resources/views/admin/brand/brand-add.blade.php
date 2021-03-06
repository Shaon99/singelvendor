@extends('admin.layout.master')
@section('title', 'Add Brand')
@section('pageTitle') <a href="{{route('brand.add')}}">Add Brand</a> @endsection
@section('parentPageTitle') <a href="{{route('brand.view')}}">Brands</a> @endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h6>
          @if (isset($editdata))
              Edit Brand
              @else
              Add Brand
          @endif

        <a class=" float-right btn btn-success btn-sm" href="{{ route('brand.view') }}"><i class="fa fa-list"></i> Brand List</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{ (@$editdata)? route('brand.update',$editdata->id): route('brand.store') }}" id="myform" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="description">Brand Name</label>
                  <input type="text" id="name" class="form-control" name="name" placeholder="Write Brand name"  value="{{ (@$editdata->name) }}" required>
                  <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
              </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                  <input type="file" class="form-control" name="brand_image" >
              </div>
          </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                  <input type="submit" class="btn btn-primary" value="{{ (@$editdata)? "Update": "Submit" }}">

              </div>

          </form>
      </div>

    </div>

@stop

@section('page-script')

    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });

@stop
