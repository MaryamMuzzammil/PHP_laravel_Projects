{{-- @extends('panel.adminlayout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog_list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="edit-event">Blogs</h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3">
          @if(!empty($permissionAdd))
            <a href="{{route('donationadd')}}" class="btn btn-primary">Add Blogs</a>
            @endif
          </div>
        <form action="{{ route('donationslist') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search blogs..." value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
          {{-- <table class="table table-striped"> --}}
            {{-- <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Payment Method</th>
                  @if (!empty($permissionEdit) || !empty($permissionDelete))
                  <th scope="col">Action</th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @foreach ($getRecord as $donation)
              <tr>
                  <th scope="row">{{ $donation->id }}</th>
                  <td>{{ $donation->name }}</td>
                  <td>{{ $donation->email }}</td>
                  <td>{{ $donation->amount }}</td>
                  <td>{{ $donation->payment_method }}</td>
                  <td>
                      @if (!empty($permissionEdit))
                      <a href="{{ route('donationsedit', $donation->id) }}" class="btn btn-warning">Edit</a>
                      @endif
                      @if (!empty($permissionDelete))
                      <form action="{{ route('donationsdelete', $donation->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      @endif
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center mt-3">
          {{ $getRecord->appends(request()->input())->links('pagination::bootstrap-5') }}
      </div> --}}
    {{-- </div>
</body>
</html>
@endsection  --}}
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
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
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
          @if(!empty($permissionAdd))
            <a href="{{ route('donationsadd') }}" class="btn btn-primary">Add Donation</a>
            @endif
          </div>
        {{-- <form action="{{ route('donationslist') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search donations..." value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form> --}}
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
                <th scope="col">Payment Method</th>
                @if (!empty($permissionEdit) || !empty($permissionDelete))
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($getRecord as $donation)
            <tr>
                <th scope="row">{{ $donation->id }}</th>
                <td>{{ $donation->name }}</td>
                <td>{{ $donation->email }}</td>
                <td>{{ $donation->amount }}</td>
                <td>{{ $donation->payment_method }}</td>
                <td>
                    @if (!empty($permissionEdit))
                    <a href="{{ route('donationsedit', $donation->id) }}" class="btn btn-warning">Edit</a>
                    @endif
                
                    @if (!empty($permissionDelete)) 
                    <a href="{{route('donationsdelete', $donation->id)}}" class="btn btn-danger">Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
          {{ $getRecord->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>
</html>
@endsection
