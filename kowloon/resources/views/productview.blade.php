@extends('layouts.app')

@section('content')
@include('common.carousel')
    <div class="content">
        <div class="main-content">
            <h1 class="title">Hondenartikelen</h1>
                <div id="toggleFilter" onclick="filterProducts()">
                    <span>Filter</span>
                    <span class="caret"></span>
                </div>
                <div class="filter">
                    <form action="/category/{{$category->id}}" method="GET">
                        <div class="filters">
                            <p>Op Collectie</p>
                            @if ($collections)
                                @foreach ($collections as $collection)
                                    <div class="collection-item">
                                        <input type="checkbox" name="collections" value="{{$collection->id}}" {{(in_array($collection->id, $selectedCollections) ? 'checked' : '')}}>
                                        <label>{{$collection->name}}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="price-range">
                            <p>Prijsbereik</p>
                            <span class="price">€ <input type="text" name="minprice" value="{{$minimumPrice}}"></span>
                            <span class="price-divider"> - </span>
                            <span class="price">€ <input type="text" name="maxprice" value="{{$maximumPrice}}"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Filter" class="button">
                        </div>
                    </form>
                </div>
                <hr>
                <div class="category-text-right">
                    <span class="text-right">{{$category->name}}:</span>
                    <span>{{$products->count()}} of {{$products->total()}}</span>
                </div>
                <div class="dropdown sort-dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expendad="true">
                        <span class="caret"></span>  
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="filter-value" href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'], 'relevance', url()->full()) : '?sort=relevance')}}">Relevantie</a></li>
                        <li><a class="filter-value" href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'], 'price_asc', url()->full()) : '?sort=price_asc')}}">Laag naar hoog</a></li>
                        <li><a class="filter-value" href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'], 'price_desc', url()->full()) : '?sort=price_desc')}}">Hoog naar laag</a></li>
                        <li><a class="filter-value" href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'], 'latest', url()->full()) : '?sort=latest')}}">Nieuwste</a></li>
                        <li><a class="filter-value" href="{{ (isset($_GET['sort']) ? str_replace($_GET['sort'], 'oldest', url()->full()) : '?sort=oldest')}}">Oudste</a></li>
                    </ul>
                </div>
                <div class="hot-items products">
                    @if ($products->count())
                        @foreach ($products as $product)
                            <div class="hot-item">
                                @if ($product->productImages->count() > 1)
                                    <div class="image-count">
                                        <span>{{$product->productImages->count()}}</span>
                                    </div>
                                @endif
                                <a href="#">
                                    <div class="hot-item-image">
                                        <div class="overlay">
                                            <img src="/img/{{$product->productImages->first()->image_url}}" />
                                            <div class="after">Details</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="hot-item-desc">
                                     <span>{{$product->name}}</span>
                                     <span>€ {{$product->price}}</span>
                                </div>  
                            </div>
                        @endforeach
                    @endif
                        <div class="pagination">
                            {{$products->links()}}
                        </div>
                </div>
        </div>
    </div>
@endsection