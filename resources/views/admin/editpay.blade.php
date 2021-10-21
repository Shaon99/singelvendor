@extends('admin.layout.master')
@section('title', 'Edit Useful Links')
@section('pageTitle') <a href="{{route('pay.edit', $payment->id)}}">Edit Payment Method </a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                    Edit payment Method

                <a class=" float-right btn btn-success btn-sm" href="/admin/paymentall"><i class="fa fa-list"></i>Payment Method List</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('pay.update', $payment->id) }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="description">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Payment method name"  value="{{old('name',$payment->name)}}" required>
                    <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                </div>

                <div class="form-row col-md-10">
                    <label for="description">Number</label>
                    <input type="number" id="number" class="form-control" name="number" placeholder="number" value="{{old('link',$payment->number)}}" required>
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
