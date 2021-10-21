@extends('Frontend.layouts.master')

@section('content')
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active"> Terms and Conditions </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="service-area pb-3">
            <div class="container">
                @if (!empty($term))
                    {!! $term->content !!}
                @endif
            </div>
        </div>
    
@endsection