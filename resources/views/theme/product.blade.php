@extends('theme.layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div class="logo">LOGO</div>
        <div class="cart">{{ \Cart::total() }}</div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            @if ($product->branch)
                <li class="breadcrumb-item"><a href="#">{{ $product->branch->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 col-md-6">
            @include('theme.partials.images')
        </div>
        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $product->name }}</h1>
                <div class="price">{{ $product->price }}</div>
            </div>
            <div class="product-description mb-3">
                {!! $product->description !!}
            </div>
            <div class="product-description">
                @include('theme.partials.add-to-cart')
            </div>
            <div class="border p-3 mt-3">
                @include('theme.partials.tabs')
            </div>
        </div>
    </div>
@endsection
