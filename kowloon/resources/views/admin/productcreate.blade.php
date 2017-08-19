@extends('layouts.app')

@section('content')
<div class="faq-page">
	<div class="main-content">
		<a href="/admin/products">Products</a>
		<h1>New Product</h1>
		{!! Form::open(['url' => '/admin/products/create', 'files' => true]) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('nl_name'))
					<div class="alert alert-danger">{{ $errors->first('nl_name') }}</div>
				@endif
				{{ Form::label('nl_name', 'nl_name') }}
				{{ Form::text('nl_name', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('fr_name'))
					<div class="alert alert-danger">{{ $errors->first('fr_name') }}</div>
				@endif
				{{ Form::label('fr_name', 'fr_name') }}
				{{ Form::text('fr_name', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('price'))
					<div class="alert alert-danger">{{ $errors->first('price') }}</div>
				@endif
				{{ Form::label('price', 'Price (€)') }}
				{{ Form::text('price', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('nl_description'))
					<div class="alert alert-danger">{{ $errors->first('nl_description') }}</div>
				@endif
				{{ Form::label('nl_description', 'nl_description') }}
				{{ Form::text('nl_description', '', ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('fr_description'))
					<div class="alert alert-danger">{{ $errors->first('fr_description') }}</div>
				@endif
				{{ Form::label('fr_description', 'fr_description') }}
				{{ Form::text('fr_description', '', ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('technical_info'))
					<div class="alert alert-danger">{{ $errors->first('technical_info') }}</div>
				@endif
				{{ Form::label('technical_info', 'Technical Info') }}
				{{ Form::text('technical_info', '', ['class' => 'form-control']) }}
			</div>
			<label>Collections</label>
			@foreach ($collections as $collection)
				<div class="form-group">
					{{ Form::checkbox('collections[]', $collection->id) }}
					{{ Form::label($collection->nl_name) }}
				</div>
			@endforeach

			@if ($errors->first('category'))
				<div class="alert alert-danger">{{ $errors->first('category') }}</div>
			@endif
			<label>Categories</label>
			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id) }}
					{{ Form::label($category->nl_name) }}
				</div>
			@endforeach
			
			<label for="colors[]">Colors</label>
			<div id="colorWheel"></div>
			<button type="button" onclick="colorInput()" id="color">Pick Color</button>
			<div class="clearfix"></div>

			<label for="dimensions[]">Dimensions</label>
			<div id="dimensionsContainer"></div>
			<button type="button" onclick="dimensionInput()" id="dimension">Pick Dimensions</button>
			<div class="clearfix"></div>
			<div id="image-upload-container">
				<div class="form-group" id="upload-image">
					@if ($errors->first('image'))
						<div class="alert alert-danger">{{ $errors->first('image') }}</div>
					@endif
					{{ Form::label('Image upload ') }}
					{{ Form::file('image[]')}}
					@if ($errors->first('image_desc'))
						<div class="alert alert-danger">{{ $errors->first('image_desc') }}</div>
					@endif
					<label for="image_desc_nl[]">Image Desc nl</label>
                    <input type="text" name="image_desc_nl[]" class="form-control">
                    <label for="image_desc_fr[]">Image Desc fr</label>
					<input type="text" name="image_desc_fr[]" class="form-control">
				</div>
			</div>
			<button type="button" onclick="createImageContainer()" id="imageContainer">Add Another One</button>
			<div class="form-group">
				{{ Form::submit('Save', ['class' => 'button']) }}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection