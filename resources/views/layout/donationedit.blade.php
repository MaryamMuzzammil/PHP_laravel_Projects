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
    <style>
        body {
            background-color: #fff7e6;
        }
        .form-container {
            background-color: #ffeb99;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            color: #996600;
        }
        .btn-primary {
            background-color: #996600;
            border-color: #996600;
        }
        .edit-event {
            color: #996600;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="edit-event">Edit Donation</h3>
        <form action="{{ route('donations.update', $donation->id) }}" method="post" class="form-container">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $donation->name }}">
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $donation->email }}">
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Donation Amount:</label>
                <input type="number" name="amount" class="form-control" value="{{ $donation->amount }}">
                @error('amount')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Method:</label>
                <select name="payment_method" class="form-control">
                    <option value="credit_card" {{ $donation->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="paypal" {{ $donation->payment_method == 'paypal' ? 'selected' : '' }}>PayPal</option>
                </select>
                @error('payment_method')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
@endsection
