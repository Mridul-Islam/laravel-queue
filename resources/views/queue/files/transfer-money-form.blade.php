@extends('layouts.app')



@section('content')

    <div class="my-5">
        <div>
            <h4>Transfer Money</h4>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="p-3 mb-2 bg-info text-dark">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('store_transfer_money') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Amount</label>
            <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="transfer_amount" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Transfer</button>
        </div>
    </form>


@endsection
