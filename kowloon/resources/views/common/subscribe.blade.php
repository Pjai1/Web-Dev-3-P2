@if(Session::has('subscription_success'))
	<div class="alert alert-success successMsg"><span>{{ session('subscription_success') }}</span></div>
@endif
@if(Session::has('subscription_failed'))
	<div class="alert alert-warning warningMsg"><span>{{ session('subscription_failed') }}</span></div>
@endif
@if ($errors->first('email'))
	<div class="alert alert-warning warningMsg"><span>{{ $errors->first('email') }}</span></div>
@endif
<div class="subscription-content">
	<div class="promotion">
		<h1>ontdek ongelofelijke Kowloonpromoties!</h1>
		<h3>alleen in onze nieuwsbrief</h3>
	</div>
	<div class="email-content">
		<h3>Abonneer op onze nieuwsbrief</h3>
		<span>Lorem ipsum dolor sit amet.</span>
		{!! Form::open(['url' => '/subscribe']) !!}
			{{ Form::token() }}
			{{ Form::text('email', '', ['placeholder' => 'domain@name.com']) }}
			{{ Form::submit('OK') }}
		{!! Form::close() !!}
	</div>
</div>