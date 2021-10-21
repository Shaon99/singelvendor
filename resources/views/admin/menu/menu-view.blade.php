@extends('admin.layout.master')
@section('title', 'Menu')
@section('pageTitle') <a href="{{route('menu.view')}}">Menus</a> @endsection
@section('parentPageTitle', '')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>Menu List</h6>
                <a class=" btn btn-primary m-b-15" href="{{ route('menu.add') }}"><i class="fa fa-plus-circle"></i> Add Menu</a>
                {{-- <a href="{{ route('admin.create') }}">
                    <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add Admin
                    </button>
                </a> --}}
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
                    <table class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($menus as $menu)
                            <tr class="gradeA">
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->link}}</td>              
                                <td class="actions">
                                    <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                    <!-- for deleting menu using one form -->
                                    <div hidden> {{$route = route('menu.delete',$menu->id)}}</div>
                                    <a href="{{ route('menu.delete',$menu->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
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
                    <form id="delete-form" method="POST"  class="d-none">
                            @csrf
                            @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
