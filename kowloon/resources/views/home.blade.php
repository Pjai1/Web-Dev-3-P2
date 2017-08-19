@extends('layouts.app')

@section('content')

@include('admin.adminnav')
@include('common.carousel')

<div class="content">
    <div class="home-intro">
        <p>{{trans('translations.welcome')}}</p>
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
        </div>
        @include('common.subscribe')
    </div> 
</div>

@endsection
