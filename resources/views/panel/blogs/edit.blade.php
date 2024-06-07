@extends('panel.adminlayout.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="edit-blog">Edit New Blog</h3>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Error Message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="" method="post" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="mb-3">
                <label class="form-label">Blog Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $getRecord->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Blog Content:</label>
                <input type="text" name="content" class="form-control" value="{{ $getRecord->content }}">
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Posting:</label>
                <input type="date" name="date" class="form-control" value="{{ $getRecord->date }}">
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image:</label>
                    <img src="{{ asset($getRecord->image) }}" alt="Current Image" style="max-width: 20%;">
            </div>
            <div class="mb-3">
                    <label class="form-label">New Image</label>
                    <input type="file" name="image" class="form-control">
                 </div>
               
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            
            <button type="submit" class="btn btn-primary" style="margin-top: 1em;">Update</button>
        </form>
    </div>
</body>
</html>
@endsection
