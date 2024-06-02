@extends('panel.adminlayout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #fff7e6;
        }
        .edit-event {
            color: #996600;
        }
        .btn-primary {
            background-color: #996600;
            border-color: #996600;
        }
        .btn-warning {
            background-color: #fff2cc;
            border-color: #fff2cc;
            color: #996600;
        }
        .btn-danger {
            background-color: #ff6666;
            border-color: #ff6666;
        }
        .btn-primary:hover {
            background-color: #cc7a00;
            border-color: #cc7a00;
        }
        .btn-warning:hover {
            background-color: #ffe599;
            border-color: #ffe599;
            color: #996600;
        }
        .btn-danger:hover {
            background-color: #e60000;
            border-color: #e60000;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .input-group .form-control {
            border-color: #996600;
        }
        .input-group .btn-primary {
            border-color: #996600;
        }
        .alert-success {
            background-color: #ffeb99;
            color: #996600;
            border-color: #996600;
        }
        .pagination {
            justify-content: center;
        }
        .pagination .page-item.active .page-link {
            background-color: #fff2cc;
            border-color: #fff2cc;
        }
        .pagination .page-link {
            color: #996600;
            background-color: #fff7e6;
            border: 1px solid #996600;
            margin: 0 2px;
        }
        .pagination .page-link:hover {
            background-color: #ffe599;
            border-color: #ffe599;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="edit-event">Donations</h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3">
            <a href="{{ route('donations.create') }}" class="btn btn-primary">Add Donation</a>
        </div>
        <form action="{{ route('donations.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search donations..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                    <tr>
                        <td>{{ $donation->name }}</td>
                        <td>{{ $donation->email }}</td>
                        <td>{{ $donation->amount }}</td>
                        <td>{{ $donation->payment_method }}</td>
                        <td>
                            <a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $donations->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
@endsection
