<!-- resources/views/albums/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Album</div>

        <div class="card-body">
            <form action="{{ route('albums.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Artist's Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="album">Album</label>
                    <input type="text" class="form-control" id="album" name="album" required>
                </div>

                <div class="form-group">
                    <label for="sales">Sales</label>
                    <input type="number" class="form-control" id="sales" name="sales" required>
                </div>

                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Add Album</button>
            </form>
        </div>
    </div>
@endsection
