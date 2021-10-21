@extends('admin.layout.master')
@section('title', 'Edit Sub Menu')
@section('parentPageTitle') <a href="{{route('sub.menu.view')}}">Sub Menus</a> @endsection
@section('pageTitle') <a href="#">Edit Sub Menu</a> @endsection


@section('content')
<div class="row clearfix card">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card-body">

            <form class="form-horizontal" action="{{ route('sub.menu.update', $sub->id) }}" method="post">
                @csrf

                <div class="form-group col-md-6">
                    <label for="menu_id">Menu Name</label>
                    <select  name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu_id" required>
                        <option value="">Select Menu</option>
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}" {{ $sub->menu_id == $menu->id ? 'selected' : null}} required> {{$menu->name}} </option>
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
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{old('name', $sub->name)}}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="link">Sub Menu Link</label>
                    <select name="link" class="form-control @error('link') is-invalid @enderror" id="link" required autofocus>
                        <option  value="">Select Link</option>
                        <option value="#">Empty</option>
                        <option value="/" {{$sub->link == '/' ? 'selected' : null}} >Home</option>
                        <option  value="/shop" {{$sub->link == '/shop' ? 'selected' : null}}>Shop</option>
                        <option value="/contact" {{$sub->link == '/contact' ? 'selected' : null}}>Contact</option>
                        <option value="/about-us" {{$sub->link == '/about-us' ? 'selected' : null}}>About us</option>
                        <option value="/show-cart" {{$sub->link == '/show-cart' ? 'selected' : null}}> Cart Page</option>
                        <option value="/checkout" {{$sub->link == '/checkout' ? 'selected' : null}}> Checkout </option>
                        <option value="/user/userAccount" {{$sub->link == '/user/userAccount' ? 'selected' : null}}> My Account </option>
                        <option value="/wishlist" {{$sub->link == '/wishlist' ? 'selected' : null}}> Wishlist </option>
                        <option value="/login" {{$sub->link == '/login' ? 'selected' : null}}> Login/Register </option>
                        <option value="/terms-and-conditions" {{$sub->link == '/terms-and-conditions' ? 'selected' : null}}> Terms & Conditions </option>
                        <option value="/privacy-policy" {{$sub->link == '/privacy-policy' ? 'selected' : null}}> Privacy Policy </option>
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
