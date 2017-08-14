@extends('layouts.app')

@section('content')

@include('common.carousel')

<div class="content">
    <div class="home-intro">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="categories">
        @foreach($categories as $category)
            <div class="category">
                <i class="icon {{$category->classname}}"></i>
                <span>{{$category->name}}</span>
            </div>
        @endforeach
    </div>
    <div class="main-content">
        <h1>Hot items.</h1>
        <div class="hot-items">
            @foreach ($hotitems as $hotitem)
                <div class="hot-item">
                    @if ($hotitem->product->productImages->count() > 1)
						<div class="image-count">
							<span>{{$hotitem->product->productImages->count()}}</span>
						</div>
					@endif
                    <a href="#">
                        <div class="hot-item-image">
                            <div class="overlay">
                                <img src="/img/{{$hotitem->product->productImages->first()->image_url}}" />
                                <div class="after">Details</div>
                            </div>
                        </div>
                    </a>
                    <div class="hot-item-desc">
                        <span>{{$hotitem->product->name}}</span>
                        <span>€ {{$hotitem->product->price}}</span>
                    </div>
                </div>
            @endforeach
            <span class="store-span"><a href="#">Ga naar winkel</a></span>
            @include('common.subscribe')
        </div>
    </div> 
</div>

@endsection
