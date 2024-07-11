@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
            <p>Artists</p>
            <a href="{{ route('artists.create') }}" class="btn btn-sm btn-primary mb-3">Add Artist</a>
        </div>

        <div class="card-body" style="max-height:500px; overflow-y:auto;" >
            

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artists as $artist)
                        <tr>
                            <td>{{ $artist->id }}</td>
                            <td>{{ $artist->name }}</td>
                            <td>{{ $artist->username }}</td>
                            <td>{{ $artist->email }}</td>
                            <td>
                                <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
