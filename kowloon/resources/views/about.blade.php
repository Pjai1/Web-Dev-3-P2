@extends('layouts.app')

@section('content')
    <a href="/home"><img src="/img/logo_big.png" class="carousel-logo"></a>
    <div class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <img src="/img/carousel-3.png">
            </div>
        </div>
    </div>
    <div class="content">
        <div class="main-content">
            <div class="about-title">
                <img src="/img/logo_small.png" class="logo_small" />
                <div class="about-text">about us</div>
            </div>
            <h1 class="title">About us</h1>
            <div class="about-content">
                <div class="left-about-content">
                    <h3 class="title">Kowloon</h3>
                    <p>Pet Concept, active since 1998, is developing, importing and exporting products for pets worldwide</p>
                    <p>Natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae sequi nesciunt.</p>
                </div>
                <div class="right-about-content">
                    <h3 class="title">Contact</h3>
                    <ul>    
                        <li>Deckx Johan</li>
                        <li>Bosdreef 7</li>
                        <li>2200 Herentals</li>
                    </ul>
                </div>
            </div>
            <div class="about-form">
                @if(Session::has('about_form_status'))
		    	    <div class="alert alert-success successMsg"><span>{{ session('about_form_status') }}</span></div>
                @endif
                @if ($errors->all())
                    <div class="alert alert-warning warningMsg"><span>Vul alle velden in.</span></div>
                @endif
                <h3 class="title">Contacteer ons</h3>
                {!! Form::open(['url' => '/contact']) !!}
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email', '', ['placeholder' => 'name@domain.com','class' => 'form-control']) }}
                        @if ($errors->first('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('message', 'Jouw Bericht') }}
                        {{ Form::textarea('message', '', ['placeholder' => 'Je bericht hier ...','class' => 'form-control']) }}
                        @if ($errors->first('message'))
                            {{ $errors->first('message') }}
                        @endif
                    </div>
                    
                    <div class="form-group">
                        {{ Form::submit('Verstuur', ['class' => 'button']) }}
                    </div>
                {!! Form::close() !!}
            </div>
            @include('common.faq')
        </div>
    </div>
@endsection