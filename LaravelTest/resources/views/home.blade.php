<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h4>Top Artist with Most Combined Album Sales</h4>
        @if($topArtist)
            <p>The top artist is <strong>{{ $topArtist->name }}</strong> with <strong>₱ {{ number_format($topArtist->albums_sum_sales,2) }}</strong> combined album sales.</p>
        @else
            <p>No data available.</p>
        @endif
        <div class="row mb-4 mt-4">
            <div class="col-md-6 p-3" >
                <h4>Total Number of Albums Sold Per Artist</h4>
                <div style="max-height:300px; overflow-y:auto;"  >
                    <table class="table">
                        <thead style="top:0; position:sticky; background:white;">
                            <tr>
                                <th>Artist</th>
                                <th>Total Albums Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($totalAlbumsSoldPerArtist as $artist)
                                <tr>
                                    <td>{{ $artist->name }}</td>
                                    <td>{{ $artist->albums_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 p-3"  >
            <h4>Combined Album Sales Per Artist</h4>
            <div style="max-height:300px; overflow-y:auto;">

                <table class="table" >
                    <thead style="top:0; position:sticky; background:white;">
                        <tr>
                            <th>Artist</th>
                            <th>Combined Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($combinedAlbumSalesPerArtist as $artist)
                            <tr>
                                <td>{{ $artist->name }}</td>
                                <td>₱ {{ number_format($artist->albums_sum_sales,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        

        <h4>Search Albums by Artist</h4>
        <form action="{{ route('home.search') }}" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" id="artist" name="artist" placeholder="Enter artist name">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @isset($albums)
            <h4>Albums by {{ $artistName }}</h4>
            @if(count($albums) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Album Name</th>
                            <th>Sales</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                            <tr>
                                <td>{{ $album->album }}</td>
                                <td>₱ {{ number_format($album->sales,2) }}</td>
                                <td><img src="{{ $album->image }}" alt="Album Image" style="max-width: 100px;"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No albums found for "{{ $artistName }}".</p>
            @endif
        @endisset
    </div>
@endsection
