@extends('panel.adminlayout.app')
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
            <a href="{{route('blogsadd')}}" class="btn btn-primary">Add Blogs</a>
            @endif
          </div>
        <form action="{{ route('blogslist') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search blogs..." value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
          {{-- <table class="table table-striped"> --}}
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                @if (!empty($permissionEdit || $permissionDelete))
                <th scope="col">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $value)
              <tr>
                  <th scope="row">{{$value->id}}</th>
                  <td>{{$value->title}}</td>
                  <td>{{$value->date}}</td>
                  <td>{{$value->image}}</td>
                  <td>
                    @if (!empty($permissionEdit))  
                  <a href="{{route('blogsedit',$value->id)}}" class="btn btn-warning">Edit</a>
                    @endif
                    @if (!empty($permissionDelete)) 
                 <a href="{{route('blogsdelete',$value->id)}}" class="btn btn-danger">Delete</a>
                 @endif
                </td>

                </tr>
              @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center mt-3">
          {{ $getRecord->appends(request()->input())->links('pagination::bootstrap-5') }}
      </div> --}}
    </div>
</body>
</html>
@endsection
