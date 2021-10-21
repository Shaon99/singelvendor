@extends('admin.layout.master')
@section('title', 'Subscriber List')
@section('pageTitle') <a href="{{route('newsletter.view')}}">Subscriber List</a> @endsection


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
                                    <div class="table-responsive">
                                        <table  id="myTable" class="table table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>Subscribe Date</th>
                                                <th>Name</th>
                                              
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Subscribe Date</th>
                                                <th>Name</th>
                                                
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($newsletter as $subscriber)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($subscriber->created_at)->format('d-m-Y') }}</td>
                                                    <td>{{$subscriber->email}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                        <form action="{{route('newsletter.destroy',$subscriber->id)}}" class="deleteForm" onsubmit="return confirm('Are you sure want to delete this product?')" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm btn-icon on-default button-remove deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-trash" aria-hidden="true"></i></button>
                                                        </form>
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

@stop



