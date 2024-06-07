@extends('panel.adminlayout.app')

@section('content')

<link href="{{ asset('css/form.css') }}" rel="stylesheet">
<br>
<div class="container">
    <h2>Change Password</h2>
<br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.change-password') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
<br>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
<br>
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
           <br>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>
@endsection
<br><br>