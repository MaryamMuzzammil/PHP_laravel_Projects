@extends('panel.adminlayout.app')

@section('content')

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
    <div class="container mt-5">
        <h3 class="edit-event">Edit New Testimonial</h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Content:</label>
                <input type="text" name="content" class="form-control" value="{{ old('content') }}">
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Profession:</label>
                <input type="text" name="profession" class="form-control" value="{{ old('profession') }}">
                @error('profession')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Select Image:</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Testimonial</button>
        </form>
    </div>
@endsection
