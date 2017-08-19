@extends('layouts.app')

@section('content')
<div class="faq-page">
    <div class="main-content">
        <a href="/admin/faqs">Faqs</a>
        <h1>Faq Create</h1>
        {!! Form::open(['url' => '/admin/faqs/create']) !!}
				{{ Form::token() }}
				<div class="form-group">
					{{ Form::label('nl_question', 'nl_question') }}
					{{ Form::text('nl_question', '', ['class' => 'form-control']) }}
					@if ($errors->first('nl_question'))
						{{ $errors->first('nl_question') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('fr_question', 'fr_question') }}
					{{ Form::text('fr_question', '', ['class' => 'form-control']) }}
					@if ($errors->first('fr_question'))
						{{ $errors->first('fr_question') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('nl_answer', 'nl_answer') }}
					{{ Form::text('nl_answer', '', ['class' => 'form-control']) }}
					@if ($errors->first('nl_answer'))
						{{ $errors->first('nl_answer') }}
					@endif
				</div>
				<div class="form-group">
					{{ Form::label('fr_answer', 'fr_answer') }}
					{{ Form::text('fr_answer', '', ['class' => 'form-control']) }}
					@if ($errors->first('fr_answer'))
						{{ $errors->first('fr_answer') }}
					@endif
				</div>
                <p>Attached products</p>
				@foreach ($products as $product)
					<div class="form-group">
						{{ Form::checkbox('products[]', $product->id)}}
						{{ Form::label($product->nl_name) }}
					</div>
				@endforeach
				
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'button']) }}
				</div>
			{!! Form::close() !!}
    </div>
</div>
@endsection