@extends('layouts.app')

@section('content')
    <div class="faq-page">
        <div class="main-content">
            <div id="toggleFilter" onclick="filterProducts()">
                <span class="search-title">Geavanceerde Filter</span>
                <span class="caret black-caret"></span>
            </div>
            {!! Form::open(['url' => '/search', 'method' => 'GET', 'id' => 'search-form']) !!}
            <div class="filter">
                <div class="filters">
                    <p>Categorie</p>
                    @foreach ($categories as $key => $category)
                    <div class="collection-item">
                        {{ Form::checkbox('categories[]', $category->id, (in_array($category->id, $selectedCategories)) ? true : '') }}
                        {{ Form::label($category->name) }}
                    </div>
                    @endforeach
                </div>
                <div class="price-range">
                    <p>Prijsbereik</p>
                    <span class="price">€ <input type="text" name="minprice" value="{{$minPrice}}"></span>
                    <span class="price-divider"> - </span>
                    <span class="price">€ <input type="text" name="maxprice" value="{{$maxPrice}}"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            {{ Form::text('query', '', ['placeholder' => 'Begin te typen en druk enter', 'class' => 'search-faq orange', 'onkeypress' => 'keyPress(event);']) }}
            {!! Form::close() !!}

            @if ($results)
                @if ($results->count())
                    <div class="faq-info">
                        <span>Niet gevonden wat je zocht?</span><br>
                        <span>Je kan altijd <a href="/about">support</a> contacteren. We helpen je graag!</span>
                    </div>
                @endif
            @endif

            @if ($data)
                <h3 class="search-data">{{$data}}</h3>
            @endif

            @if ($results && $searchStr)
                @if ($results->count() == 1)    
                    <h3 class="search-data">1 resultaat gevonden voor {{$searchStr}}:</h3>
                @elseif ($results->count())
                    <h3 class="search-data">{{$results->total()}} resultaten gevonden voor {{$searchStr}}:</h3>
                @else
                    <h3 class="search-data">Geen resultaten gevonden voor {{$searchStr}}.</h3>    
                @endif
            @endif

            <div class="search-results">
                @if ($results)
                    @foreach ($results as $result)
                        <div class="search-result">
                            <div class="result-image">
                                <a href="/category/{{$result->category_id}}/product/{{$result->id}}"><img src="/img/{{$result->productImages->first()->image_url}}"></a>
                            </div>
                            <div class="text-result">
                                <a href="/category/{{$result->category_id}}/product/{{$result->id}}"><h3>{{$result->name}}</h3></a>
                                <span>€ {{$result->price}}</span>
                                <p>{{$result->description}}</p>
                                <p>{{$result->technical_info}}</p>
                                <a href="/category/{{$result->category->id}}/product/{{$result->id}}"></a>
                            </div>
                        </div>
                    @endforeach
                    {{$results->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection