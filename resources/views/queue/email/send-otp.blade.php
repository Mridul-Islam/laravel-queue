@extends('layouts.email')


@section('content')

	<div>

		<h2 class="mb-5">Otp Send Successfully</h2>

		<h5 class="mb-3">Dear User,</h5>

		<p>Your OTP is - {{ rand(1000, 9999) }}.</p>
		<p>Note: Don't Share Your Otp with anyone.</p>

		<p>Thank you.</p>

	</div>

@endsection