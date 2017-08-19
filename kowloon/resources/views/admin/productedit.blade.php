@extends('layouts.app')

@section('content')
<div class="faq-page">
	<div class="main-content">
		<a href="/admin/products">Products</a>
		<h1>Edit Product</h1>
		{!! Form::open(['url' => '/admin/products/'.$product->id.'/edit', 'files' => true]) !!}
			{{ Form::token() }}
			<div class="form-group">
				@if ($errors->first('nl_name'))
					<div class="alert alert-danger">{{ $errors->first('nl_name') }}</div>
				@endif
				{{ Form::label('nl_name', 'nl_name') }}
				{{ Form::text('nl_name', $product->nl_name, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('fr_name'))
					<div class="alert alert-danger">{{ $errors->first('fr_name') }}</div>
				@endif
				{{ Form::label('fr_name', 'fr_name') }}
				{{ Form::text('fr_name', $product->fr_name, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('price'))
					<div class="alert alert-danger">{{ $errors->first('price') }}</div>
				@endif
				{{ Form::label('price', 'Price (€)') }}
				{{ Form::text('price', $product->price, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				@if ($errors->first('nl_description'))
					<div class="alert alert-danger">{{ $errors->first('nl_description') }}</div>
				@endif
				{{ Form::label('nl_description', 'nl_description') }}
				{{ Form::text('nl_description', $product->nl_description, ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('fr_description'))
					<div class="alert alert-danger">{{ $errors->first('fr_description') }}</div>
				@endif
				{{ Form::label('fr_description', 'fr_description') }}
				{{ Form::text('fr_description', $product->fr_description, ['class' => 'form-control']) }}	
			</div>
			<div class="form-group">
				@if ($errors->first('technical_info'))
					<div class="alert alert-danger">{{ $errors->first('technical_info') }}</div>
				@endif
				{{ Form::label('technical_info', 'Technical Info') }}
				{{ Form::text('technical_info', $product->technical_info, ['class' => 'form-control']) }}
			</div>
			<label>Collections</label>
			@foreach ($collections as $collection)
				<div class="form-group">
					{{ Form::checkbox('collections[]', $collection->id, ($product->collections->contains($collection->id) ? 'true' : '')) }}
					{{ Form::label($collection->nl_name) }}
				</div>
			@endforeach

			@if ($errors->first('category'))
				<div class="alert alert-danger">{{ $errors->first('category') }}</div>
			@endif
			<label>Categories</label>
			@foreach ($categories as $category)
				<div class="form-group">
					{{ Form::radio('category', $category->id, ($product->category->id == $category->id ? true : '')) }}
					{{ Form::label($category->nl_name) }}
				</div>
			@endforeach
			
			<label for="colors[]">Colors</label>
            <div id="colorWheel"></div>
            @foreach ($colors as $key => $color)
                <div class="colorContainer" id="colorCount {{$key+1}}">
                    <input type="color" name="colors[]" value="{{$color->hexcode}}">
                    <button type="button" id="deleteColor {{$key+1}}" onclick="deleteColorInput(this)">Remove</button>
                </div>
            @endforeach
            <input type="hidden" value="{{$colors->count()}}" id="colorCount">
            <button type="button" onclick="colorInput()" id="color">Pick Color</button>
			<div class="clearfix"></div>

			<label for="dimensions[]">Dimensions</label>
            <div id="dimensionsContainer"></div>
            @foreach ($dimensions as $dimension)
                <div class="dimensions" id="dimensionsCount1">
                    <input type="text" name="dimensions[]">
                    <button type="button" id="deleteDimensions {{$key+1}}" onclick="deleteDimensionInput(this)">Remove</button>
                </div>
            @endforeach
            <input type="hidden" value="{{$colors->count()}}" id="deleteDimensions">
			<button type="button" onclick="dimensionInput()" id="dimension">Pick Dimensions</button>
            <div class="clearfix"></div>
            
            <label>Images</label>
			@foreach ($product->productImages as $image)
				<div class="form-group">
					{{ Form::checkbox('uploadedImages[]', $image->id, true)}}
					    <img src="/img/{{$image->image_url}}">
					{{ Form::label($image->nl_description) }}
				</div>
			@endforeach

			<div id="image-upload-container">
				<div class="form-group" id="upload-image">
                    {{ Form::label('Image upload') }}
                    {{ Form::file('image[]')}}
                    {{ Form::label('image_desc_nl[]', 'image_desc_nl') }}
                    {{ Form::text('image_desc_nl[]', '', ['class' => 'form-control']) }}
                    {{ Form::label('image_desc_fr[]', 'image_desc_fr') }}
                    {{ Form::text('image_desc_fr[]', '', ['class' => 'form-control']) }}
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