@extends('admin.layout.master')
@section('title', 'Edit Menu')
@section('parentPageTitle') <a href="{{route('menu.view')}}">Menus</a> @endsection
@section('pageTitle') <a href="#">Edit Menu</a> @endsection


@section('content')
<div class="row clearfix card">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card-body">

            <form class="form-horizontal" action="{{ route('menu.update', $menu->id) }}" method="post">
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">Menu Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{old('name', $menu->name)}}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="link">Menu Link</label>
                    <select name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{old('link', $menu->link)}}" required autofocus>
                        <option  value="">Select Link</option>
                        <option value="#">Empty</option>
                        <option value="/" {{$menu->link == '/' ? 'selected' : null}} >Home</option>
                        <option  value="/shop" {{$menu->link == '/shop' ? 'selected' : null}}>Shop</option>
                        <option value="/contact" {{$menu->link == '/contact' ? 'selected' : null}}>Contact</option>
                        <option value="/about-us" {{$menu->link == '/about-us' ? 'selected' : null}}>About us</option>
                        <option value="/show-cart" {{$menu->link == '/show-cart' ? 'selected' : null}}> Cart Page</option>
                        <option value="/checkout" {{$menu->link == '/checkout' ? 'selected' : null}}> Checkout </option>
                        <option value="/user/userAccount" {{$menu->link == '/user/userAccout' ? 'selected' : null}}> My Account </option>
                        <option value="/wishlist" {{$menu->link == '/wishlist' ? 'selected' : null}}> Wishlist </option>
                        <option value="/login" {{$menu->link == '/login' ? 'selected' : null}}> Login/Register </option>
                        <option value="/terms-and-conditions" {{$menu->link == '/terms-and-conditions' ? 'selected' : null}}> Terms & Conditions </option>
                        <option value="/privacy-policy" {{$menu->link == '/privacy-policy' ? 'selected' : null}}> Privacy Policy </option>
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
