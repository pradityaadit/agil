<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Movie;
use Storage;
use Str;

class MovieController extends Controller
{
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
        $data = $request->validate([
            "title" => "required",
            "date" => "nullable",
            "video_type" => "nullable",
            "category_id" => "nullable|exists:categories,id",
            "movie_info" => "nullable",
            "screenshots" => "nullable",
            'download_description' => "required",
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "meta_title" => "nullable",
            "meta_description" => "nullable",
            "meta_keywords" => "nullable",
        ]);


        $movie = Movie::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $exsistingImage = $movie->thumbnail;
            $imagePath = public_path('/thumbnails/' . $exsistingImage);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $imageName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('/thumbnails'), $imageName);
            $data['thumbnail'] = $imageName;
        }


        // handle screenshot update
        if (isset($data['screenshots'])) {
            if ($data['screenshots']) {

                $screenshots = $data['screenshots'];
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML($screenshots, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $images = $dom->getElementsByTagName('img');


                foreach ($images as $index => $image) {
                    if (strpos($image->getAttribute('src'), 'data:image/') === 0) {
                        $imageSrc = $image->getAttribute('src');
                        list($type, $imageSrc) = explode(';', $imageSrc);
                        list(, $imageSrc) = explode(',', $imageSrc);
                        $imageData = base64_decode($imageSrc);

                        $image_name = 'upload/' . time() . Str::random(10) . '.png';
                        Storage::disk('public')->put($image_name, $imageData);

                        $image->removeAttribute('src');
                        $image->setAttribute('src', asset('storage/' . $image_name));
                    }
                }

                $screenshots = $dom->saveHTML();
                $data['screenshots'] = $screenshots;
            } else {
                $data['screenshots'] = null;
            }
        } else {
            $data['screenshots'] = null;
        }


        $movie->update($data);
        return redirect()->route('movie.all')->with('alert', 'Your movie has been updated successfully');
    }
}
