@extends('admin.layout.master')
@section('title', 'Edit About Us')
@section('pageTitle') <a href="{{route('about.us.edit', $about->id)}}">Edit About Us</a> @endsection
@section('parentPageTitle') <a href="{{route('about.us.view')}}">About Us</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                    Edit About Us

                <a class=" float-right btn btn-success btn-sm" href="{{ route('about.us.view') }}"><i class="fa fa-list"></i>About Us</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('about.us.update', $about->id) }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="content">Content</label>
                    <textarea class="summernote" id="content" class="form-control" name="content" placeholder=""  value="{{old('content')}}"  required>
                        {!! $about->content !!}
                    </textarea>
                    <font color="red">{{ ($errors->has('content'))?($errors->first('content')): '' }}</font>
                </div>

                <div class="form-group" style="padding-left: 10px;padding-top:30px">
                    <label for="about_image">About Image</label>
                    <img src="{{ asset('upload/about_image/' . $about->about_image) }}" alt="About Image" class="d-block mb-3" width="200">
                    <input type="file" class="form-control" name="about_image" id="about_image">
                </div>

                <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>

            </form>
        </div>

    </div>

@stop

@section('page-script')

jQuery(document).ready(function() {

    $('.summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
        popover: { image: [], link: [], air: [] }
    });

    $('.inline-editor').summernote({
        airMode: true
    });

    });

    window.edit = function() {
        $(".click2edit").summernote()
    },

    window.save = function() {
        $(".click2edit").summernote('destroy');
    }

@stop
