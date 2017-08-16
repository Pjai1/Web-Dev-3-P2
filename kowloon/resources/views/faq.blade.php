@extends('layouts.app')

@section('content')
    <div class="faq-page">
        <div class="main-content">
            <h1 class="title">Veelgestelde Vragen</h1>
            {!! Form::open(['url' => '/faq', 'method' => 'get']) !!}
                {{ Form::text('query', '', ['placeholder' => 'Zoek op sleutelwoorden', 'class' => 'search-faq']) }}

            {!! Form::close() !!}

            @if ($faqs)
                @if ($faqs->count())
                    <div class="faq-info">
                        <span>Niet gevonden wat je zocht?</span><br>
                        <span>Je kan altijd <a href="/about">support</a> contacteren. We helpen je graag!</span>
                    </div>
                @endif
            @endif

            @if ($data)
                <h3 class="search-data">{{$data}}</h3>
            @endif

            @if ($faqs && $searchStr)
                @if ($faqs->count() == 1)    
                    <h3 class="search-data">1 resultaat gevonden voor {{$searchStr}}:</h3>
                @elseif ($faqs->count())
                    <h3 class="search-data">{{$faqs->total()}} resultaten gevonden voor {{$searchStr}}:</h3>
                @else
                    <h3 class="search-data">Geen resultaten gevonden voor {{$searchStr}}.</h3>    
                @endif
            @endif

            <div class="search-results">
                @if ($faqs)
                    @foreach ($faqs as $faq)
                        <div class="search-result">
                            <h3>{{$faq->question}}</h3>
                            <p class="search-answer">{{$faq->answer}}</p>
                        </div>
                    @endforeach
                    {{$faqs->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection