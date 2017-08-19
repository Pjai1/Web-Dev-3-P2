@extends('layouts.app')

@section('content')
<div class="faq-page">
    <div class="main-content">
        <a href="/admin/dashboard">Dashboard</a>
        <h1>Faqs</h1>
        @if(Session::has('faq_created'))
            <div class="alert alert-success successMsg"><span>{{ session('faq_created') }}</span></div>
        @endif
        @if(Session::has('faq_updated'))
            <div class="alert alert-success successMsg"><span>{{ session('faq_updated') }}</span></div>
        @endif
        @if(Session::has('faq_deleted'))
            <div class="alert alert-success successMsg"><span>{{ session('faq_deleted') }}</span></div>
        @endif
        @if ($faqs->count())
        <table class="table">
		    <thead>
		      	<tr>
			        <th>Question</th>
			        <th>Answer</th>
			        <th>Update</th>
			        <th>Delete</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($faqs as $faq)
		      	<tr>
			        <td>{{$faq->nl_question}}</td>
			        <td>{{$faq->nl_answer}}</td>
			        <td><a href="/admin/faqs/{{$faq->id}}/edit">Update</a></td>
			        <td>
				        <form action="/admin/faqs/{{$faq->id}}/delete" method="POST">
				        	{{ Form::token() }}
				        	<input type="submit" value="Delete">
				        </form>
			        </td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
        @endif
        <a href="/admin/faqs/create">New Faq</a>
    </div>
</div>
@endsection