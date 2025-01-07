<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


use App\Models\Movie;
use Storage;
use Str;

class MovieController extends Controller
{
    public function index()
    {
        // Ambil semua movie yang statusnya 1 (terbit)
        $allMovies = Movie::where('status', 1)->get();  // Menampilkan hanya movie yang sudah dipublikasikan

        return view('home', compact('allMovies'));
    }

    public function allDrafts()
    {
        $allDrafts = Movie::where('status', 0)->paginate(10);
        return view('admin.movie.drafts', compact('allDrafts'));
    }

    public function allMovies()
    {
        $allMovies = Movie::where('status', 1)->paginate(10);
        return view('admin.movie.all_movies', compact('allMovies'));
    }

    public function makePublic($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 1]);
        return redirect()->back()->with('alert', 'Your movie has been published successfully');
    }

    public function makeDraft($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 0]);
        return redirect()->back()->with('alert', 'Your movie has been unpublished successfully');
    }

    public function deleteMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 2]); // Misalnya, mengubah status menjadi "recycle bin"
        return redirect()->back()->with('alert', 'Your movie has been moved to the recycle bin');
    }


    public function permanentDeleteMovie($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        $movie->delete();
        return redirect()->route('movie.all')->with('alert', 'Your movie has been deleted permanently');
    }

    public function openRecycleMoviePage()
    {
        $allMovies = Movie::where('status', 2)->paginate(10);
        return view('admin.movie.recycle', compact('allMovies'));
    }

    public function show($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            abort(404, 'Movie not found');
        }

        return view('movie.show', compact('movie'));
    }





    public function createMovie()
    {
        $data = Category::all();
        return view('admin.movie.create_movie', compact('data'));
    }

    public function createNewMovie(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'video_type' => 'nullable|string|max:100',
            'movie_info' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Ambil data dari form
        $data = $request->all();

        // Debug data yang diterima
        \Log::debug('Data yang diterima: ', $data);

        // Menetapkan status draft jika tidak ada status
        $data['status'] = 0;

        // Proses upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('/thumbnails'), $imageName);
            $data['thumbnail'] = $imageName;
        }

        // Menambahkan slug secara otomatis
        $data['slug'] = \Str::slug($data['title']);  // Membuat slug dari title

        // Menyimpan data ke database
        $movie = Movie::create([
            'title' => $data['title'],
            'date' => $data['date'],
            'category_id' => $data['category_id'],
            'video_type' => $data['video_type'],
            'status' => $data['status'],
            'movie_info' => $data['movie_info'],
            'description' => $data['description'],
            'thumbnail' => $data['thumbnail'] ?? null,
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'slug' => $data['slug'],
        ]);

        // Log untuk memastikan data sudah tersimpan
        \Log::debug('Data movie berhasil disimpan: ', $movie->toArray());

        // Redirect setelah berhasil
        return redirect()->route('movie.all')->with('alert', 'Your movie has been created successfully');
    }




    public function editMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('admin.movie.edit_movie', compact('movie', 'categories'));
    }


    public function updateMovie(Request $request, $id)
    {
        // Validasi inputan
        $data = $request->validate([
            "title" => "required",
            "category_id" => "required|exists:categories,id", // Pastikan kategori valid
            "description" => "nullable|string",
            "screenshots" => "nullable|string",  // Kalau kamu menyertakan base64 atau data image dalam screenshots
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "movie_info" => "nullable|string",
        ]);

        // Mencari movie berdasarkan id
        $movie = Movie::findOrFail($id);

        // Cek jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($movie->thumbnail) {
                $imagePath = public_path('/thumbnails/' . $movie->thumbnail);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Menghapus file lama
                }
            }

            // Upload thumbnail baru
            $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('/thumbnails'), $imageName);
            $data['thumbnail'] = $imageName;
        }

        // Proses update screenshot (bisa mengolah base64 atau format lainnya jika perlu)
        if ($request->has('screenshots')) {
            $data['screenshots'] = $request->screenshots;
        }

        // Update data movie
        $movie->update($data);

        // Redirect setelah update sukses
        return redirect()->route('movies.all')->with('alert', 'Movie updated successfully!');
    }


    public function play($id)
    {
        $movie = Movie::findOrFail($id); // Pastikan model Movie sudah diimport
        return view('movie.play', compact('movie'));
    }
}
