<!-- resources/views/albums/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
            <p>Albums</p>  
            <a href="{{ route('albums.create') }}" class="btn btn-sm btn-primary mb-3">Add Album</a>
        </div>

        <div class="card-body" style="max-height:500px; overflow-y:auto;"   >

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table" >
                <thead style="top:-22px; position:sticky; background:white;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Album</th>
                        <th>Sales</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->id }}</td>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->album }}</td>
                            <td>Php {{ number_format($album->sales, 2) }}</td>
                            <td><img src="{{ $album->image }}" alt="Album Image" style="max-width: 100px;"></td>
                            <td>
                                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this album?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
