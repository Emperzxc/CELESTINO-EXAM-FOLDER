@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Artist</div>

        <div class="card-body">
            <form action="{{ route('artists.update', $artist->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $artist->name }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $artist->username }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $artist->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-muted">Leave blank to keep current password.</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Artist</button>
            </form>
        </div>
    </div>
@endsection
