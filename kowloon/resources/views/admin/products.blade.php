@extends('layouts.app')

@section('content')
<div class="faq-page">
	<div class="main-content">
		<a href="/admin/dashboard">Back to dashboard</a>
		<h1>Products</h1>
        @if(Session::has('product_created'))
            <div class="alert alert-success successMsg"><span>{{ session('product_created') }}</span></div>
        @endif
        @if(Session::has('product_updated'))
            <div class="alert alert-success successMsg"><span>{{ session('product_updated') }}</span></div>
        @endif
        @if(Session::has('product_deleted'))
            <div class="alert alert-success successMsg"><span>{{ session('product_deleted') }}</span></div>
        @endif
        @if(Session::has('update_error'))
            <div class="alert alert-warning warningMsg"><span>{{ session('update_error') }}</span></div>
        @endif
		<table class="table">
		    <thead>
		      	<tr>
                    <th>Name</th>
                    <th>Category</th>
			        <th>Description</th>
			        <th>Technical Info</th>
			        <th>Collections</th>
			        <th>Update</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($products as $product)
		      	<tr>
                    <td>{{$product->nl_name}}</td>
                    <td>{{$product->category->nl_name}}</td>
			        <td>{{$product->nl_description}}</td>
			        <td>{{$product->technical_info}}</td>
			        <td>
			        	@foreach ($product->collections as $key => $collection)
							{{$collection->nl_name }}
						@endforeach
			        </td>
			        <td><a href="/admin/products/{{$product->id}}/edit">Update</a></td>
			        <td>
				        <form action="/admin/products/{{$product->id}}/delete" method="POST">
				        	{{ Form::token() }}
				        	<input type="submit" value="Delete">
				        </form>
			        </td>
		      	</tr>
		      	@endforeach
		    </tbody>
          </table>
          <a href="/admin/products/create" class="admin-right">Create product</a>
	</div>
</div>
@endsection