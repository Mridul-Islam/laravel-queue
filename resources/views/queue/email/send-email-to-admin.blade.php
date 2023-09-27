@extends('layouts.email')


@section('content')

	<div>

		<h2 class="mb-5">Latest Users</h2>

		<h5 class="mb-3">Dear Admin,</h5>

		<table class="table">
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($last_10_users as $the_user)	
				<tr>
					<td>{{ $the_user->name }}</td>
					<td>{{ $the_user->email }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@endsection