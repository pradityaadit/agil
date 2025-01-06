<?php

namespace App\Http\Controllers;

use App\Models\Movie; // Pastikan menggunakan model Movie
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua post (movie) dari database
        $allMovies = Movie::all();

        // Kirim data ke view 'home'
        return view('homescreen', compact('allMovies'));
    }
}
