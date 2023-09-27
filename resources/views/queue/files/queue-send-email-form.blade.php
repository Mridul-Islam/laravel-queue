@extends('layouts.app')



@section('content')

    <div class="row my-5">
        <div class="col-6">
            <a href="{{ route('welcome') }}">Send Email</a>
        </div>
        <div class="col-6">
            <h4>Send Email by Queue</h4>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="p-3 mb-2 bg-info text-dark">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('queue.store_user') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Send Email</button>
            <a role="button" class="btn btn-primary" href="{{ route('send_otp') }}">Send Otp</a>
        </div>
    </form>
    

@endsection