@extends('admin.layout.master')
@section('title','Sliders')
@section('pageTitle')<a href="{{route("slider.view")}}">Slider</a> @endsection
@section('parentPageTitle') @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Slider List</h2>
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                <a class=" btn btn-primary m-b-15" href="{{ route('slider.add') }}"><i class="fa fa-plus-circle"></i>
                    Add Slider</a>
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom"
                        cellspacing="0">
                        <thead>
                            <tr>
                               <th>Sl.</th>
                                <th>Short Title</th>
                                <th>Long Title</th>
                                <th>Product Link</th>
                                <th>Background Image</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alldata as $key=>$slider)
                            <tr class="gradeA">
                                <td>{{$key+1 }}</td>
                                <td>{{ $slider->short_title }}</td>
                                <td>{{ $slider->long_title }}</td>
                                <td>{{$slider->link}}</td>
                                <td><img src="{{ (!empty($slider->back_image))?url('upload/Slider_images/'.$slider->back_image):url('upload/noImage.jpg') }}"
                                        alt="" style="width: 120px" height="130px"></td>
                                <td><img src="{{ (!empty($slider->pro_image))?url('upload/Slider_images/'.$slider->pro_image):url('upload/noImage.jpg') }}"
                                        alt="" style="width: 120px" height="130px"></td>
                                <td class="actions">

                                    <a href="{{ route('slider.edit',$slider->id) }}">
                                        <button
                                            class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                            data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil"
                                                aria-hidden="true"></i>
                                        </button></a>

                                    <!-- for deleting using one form -->
                                    <div hidden> {{$route = route('slider.delete',$slider->id) }}</div>
                                    <a href="{{ route('slider.delete',$slider->id) }}"
                                        class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                        data-toggle="tooltip" data-original-title="Remove"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                        confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">
                                        <i class="icon-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <form id="delete-form" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>

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

@stop