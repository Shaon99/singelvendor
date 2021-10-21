@extends('admin.layout.master')
@section('title', 'Add Sub Menu')
@section('parentPageTitle') <a href="{{route('sub.menu.view')}}">Sub Menus</a> @endsection
@section('pageTitle') <a href="#">Add Sub Menu</a> @endsection


@section('content')
<div class="row clearfix card">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card-body">

        <form class="form-horizontal" action="{{ route('sub.menu.store') }}" method="post">
            @csrf
            <div class="form-group col-md-6">
                <label for="menu_id">Menu Name</label>
                <select  name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu_id" value="{{old('menu_id')}}" required>
                    <option value="">Select Menu</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}" required>{{$menu->name}}</option>
                    @endforeach
                </select>
                @error('menu_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="name">Sub Menu Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{old('name')}}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="link">Menu Link</label>
                <select name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{old('link')}}" required autofocus>
                    <option value="">Select Link</option>
                    <option value="#">Empty</option>
                    <option value="/">Home</option>
                    <option value="/shop">Shop</option>
                    <option value="/contact">Contact</option>
                    <option value="/about-us">About us</option>
                    <option value="/show-cart"> Cart Page</option>
                    <option value="/checkout"> Checkout </option>
                    <option value="/user/userAccount"> My Account </option>
                    <option value="/wishlist"> Wishlist </option>
                    <option value="/login"> Login/Register </option>
                    <option value="/terms-and-conditions"> Terms & Conditions </option>
                    <option value="/privacy-policy"> Privacy Policy </option>
                </select>
                @error('link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@stop
