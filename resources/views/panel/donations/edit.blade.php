@extends('panel.adminlayout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="edit-event">Edit Donation</h3>
        <form action="{{ route('donations.update', $getRecord->id) }}" method="POST" class="form-container">
            @csrf
            @method('PUT') <!-- This tells Laravel to treat this POST request as a PUT request -->
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $getRecord->name }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $getRecord->email }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Donation Amount:</label>
                <input type="number" name="amount" class="form-control" value="{{ $getRecord->amount }}">
                @error('amount')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Method:</label>
                <select name="payment_method" class="form-control">
                    <option value="credit_card" {{ $getRecord->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="paypal" {{ $getRecord->payment_method == 'paypal' ? 'selected' : '' }}>PayPal</option>
                </select>
                @error('payment_method')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
@endsection
