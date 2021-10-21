@extends('admin.layout.master')
@section('title', 'Privacy Policy')
@section('pageTitle') <a href="{{route('privacy.policy.view')}}"> Privacy Policy </a> @endsection
@section('parentPageTitle', '')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                @if(!isset($policy))
                <a class=" btn btn-primary m-b-15" href="{{ route('privacy.policy.add') }}"><i class="fa fa-plus-circle"></i> Add Privacy Policy</a>
                @endif

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
        
                @if(!empty($policy))
                    {!! $policy->content !!}                     
                @endif

                @if(!empty($policy))
                    <hr>
                    <a href="{{route('privacy.policy.edit',$policy->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                    data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                    <!-- for deleting useful links using one form -->
                    <div hidden> {{$route = route('privacy.policy.delete',$policy->id)}}</div>
                    <a href="{{ route('privacy.policy.delete',$policy->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                        confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">
                        <i class="icon-trash" aria-hidden="true"></i>
                    </a>
                @endif
                <form id="delete-form" method="POST"  class="d-none">
                        @csrf
                        @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
