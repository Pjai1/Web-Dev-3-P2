@extends('layouts.app')

@section('content')

<a href="/home"><img src="/img/logo_big.png" class="carousel-logo"></a>
<div class="content">
    <div class="main-content">
        <div class="product-detail-image">
            <div class="main-product-image">
                <img src="/img/{{$product->productImages->first()->image_url}}" />
            </div>
            <div class="product-details-thumbnail">
                @foreach ($images as $key => $image)
                    <div class="product-thumbnail">
                        <div class="details-image-content">
                            <img src="/img/{{$image->image_url}}" />
                        </div>
                        <span>{{$image->description}}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="product-detail-description">
            <div class="details-title">
                <img src="/img/logo_small.png" class="logo_small" />
                <div class="about-text">
                    <div class="category-color"></div>
                        {{$product->category->name}}
                </div>
                @foreach ($product->collections as $collection)
                    <div class="about-text">
                        {{$collection->name}}
                    </div>
                @endforeach
            </div>
            <h1 class="title">{{$product->name}}</h1>
            <h2>€ {{$product->price}}</h2>
            @if ($product->colors->count())
                <h2>Kleuren</h2>
                @foreach ($product->colors as $color)
                    <div class="color" style="background-color: {{$color->hexcode}}"></div>
                    <input type="hidden" value="{{$color->hexcode}}" class="hexcode">
                @endforeach
            @endif
            <h2>Beschrijving</h2>
            <p>{{$product->description}}</p>
        </div>
        <hr>
        <div class="product-specs">
            <h3>Specificaties</h3>
            <h4>Dimensies</h4>
            <div class="spec">
            @if ($product->dimensions->count())
                @foreach ($product->dimensions as $dimension)
                    <span>{{$dimension->specs}}
                @endforeach
            @else
                <span>Geen dimensies</span>
            @endif
            </div>
            <h4>Technische Beschrijving</h4>
            <div class="spec">
                <span>{{$product->technical_info}}</span>
            </div>
        </div>
        @if ($relatedProducts->count())
            <h1 class="title">Gerelateerde Producten</h1>
            <div class="related-products">
                @foreach ($relatedProducts as $product)
                    <div class="related-product">
                        <a href="/category/{{$product->category_id}}/product/{{$product->id}}">
                            <div class="related-product-image">
                                <img src="/img/{{$product->productImages->first()->image_url}}" />
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <span class="store-span"><a href="/category/{{$product->category_id}}">Bekijk meer</a></span>
        @endif
        @include('common.faq')
        @include('common.subscribe')
    </div>
</div>

@endsection