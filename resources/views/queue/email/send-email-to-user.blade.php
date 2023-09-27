@extends('layouts.email')


@section('content')

	<div>

		<h2 class="mb-5">Registration Successful</h2>

		<h5 class="mb-3">Dear {{ $user_mail_data['name'] }},</h5>

		<p>Your Registration was successful. Welcome to our website.</p>

		<p>Thank you.</p>

	</div>

@endsection