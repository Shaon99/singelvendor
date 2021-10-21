@extends('admin.layout.master')
@section('title', 'Add Payment')
@section('pageTitle') <a href="">Add Payment Method</a> @endsection
@section('parentPageTitle') <a href="">Add Payment Method</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                    Add Payment Method

                <a class=" float-right btn btn-success btn-sm" href="/admin/paymentall"><i class="fa fa-list"></i>Payment Method List</a>
            </h6>
        </div>
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
        <div class="card-body">

            <form method="post" action="{{ route('add.pay') }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="description">Payment Method Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Payment Method Name" required>
                    <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                </div>

                <div class="form-row col-md-10">
                    <label for="description">Payment Number</label>
                    <input type="number" id="number" class="form-control" name="number" placeholder="Payment Number" required>
                    <font color="red">{{ ($errors->has('number'))?($errors->first('number')): '' }}</font>
                </div>

                <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                    <input type="submit" class="btn btn-primary" value="Submit">
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
