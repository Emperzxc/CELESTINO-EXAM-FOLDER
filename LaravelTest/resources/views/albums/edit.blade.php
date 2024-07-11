<!-- resources/views/albums/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Album</div>

        <div class="card-body">
            <form action="{{ route('albums.update', $album->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}" required>
                </div>

                <div class="form-group">
                    <label for="album">Album</label>
                    <input type="text" class="form-control" id="album" name="album" value="{{ $album->album }}" required>
                </div>

                <div class="form-group">
                    <label for="sales">Sales</label>
                    <input type="number" class="form-control" id="sales" name="sales" value="{{ $album->sales }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $album->image }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Album</button>
            </form>
        </div>
    </div>
@endsection
