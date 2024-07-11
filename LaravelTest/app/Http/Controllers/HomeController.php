<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    private function getDashboardData()
    {
        // Total number of albums sold per artist
        $totalAlbumsSoldPerArtist = Artist::withCount('albums')->get();

        // Combined album sales per artist
        $combinedAlbumSalesPerArtist = Artist::withSum('albums', 'sales')->get();

        // Top artist who sold the most combined album sales
        $topArtist = Artist::withSum('albums', 'sales')->orderByDesc('albums_sum_sales')->first();

        return compact('totalAlbumsSoldPerArtist', 'combinedAlbumSalesPerArtist', 'topArtist');
    }

    public function index()
    {
        $data = $this->getDashboardData();
        return view('home', $data);
    }

    public function search(Request $request)
    {
        $data = $this->getDashboardData();

        $artistName = $request->input('artist');
        $albums = Album::where('name', 'like', "%{$artistName}%")->get();

        $data['albums'] = $albums;
        $data['artistName'] = $artistName;

        return view('home', $data);
    }
}
