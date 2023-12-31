@extends('layouts.app')



@section('content')

    <div class="row my-5">
        <div class="col-6">
            <h4>Send Email</h4>
        </div>
        <div class="col-6">
            <a href="{{ route('queue_send_email_form') }}">Send Email by Queue</a>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="p-3 mb-2 bg-info text-dark">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('store_user') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                Send
            </button>
        </div>
    </form>


@endsection