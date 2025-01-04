<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Movie;
use Storage;
use Str;

class MovieController extends Controller
{
    public function allDrafts(){
        $allDrafts = Movie::where('status', 0)->paginate(10);
        return view('admin.movie.drafts', compact('allDrafts'));
    }

    public function allMovies(){
        $allMovies = Movie::where('status', 1)->paginate(10);
        return view('admin.movie.all_movies', compact('allMovies'));
    }

    public function makePublic($movieId){
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 1]);
        return redirect()->back()->with('alert', 'Your movie has been published successfully');
    }

    public function makeDraft($movieId){
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 0]);
        return redirect()->back()->with('alert', 'Your movie has been unpublished successfully');
    }

    public function deleteMovie($movieId){
        $movie = Movie::findOrFail($movieId);
        $movie->update(['status' => 2]);
        return redirect()->back()->with('alert', 'Your movie has ben move to recycle bin');
    }

    public function permanentDeleteMovie($movieId){
        $movie = Movie::findOrFail($movieId);
        $movie->delete();
        return redirect()->route('movie.all')->with('alert', 'Your movie has been deleted permanently');
    }

    public function openRecycleMoviePage(){
        $allMovies = Movie::where('status', 2)->paginate(10);
        return view('admin.movie.recycle', compact('allMovies'));
    }

    public function createMovie(){
        $data = Category::all();
        return view('admin.movie.create_movie', compact('data'));
    }

    public function createNewMovie(Request $request){
        $data = $request->validate([
            "title" => "required",
            "date" => "nullable",
            "video_type" => "nullable",
            "category_id" => "nullable|exists:categories,id",
            "movie_info" => "nullable",
            "screenshots"=> "nullable",
            'download_description' => "required",
            "thumbnail" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "meta_title" => "nullable",
            "meta_description" => "nullable",
            "meta_keywords" => "nullable",
        ]);

        if($request->hasFile('thumbnail')){
            $imageName = time() . '.' .$request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('/thumbnails'), $imageName);
            $data['thumbnail']=$imageName;
        }


        $screenshots = $data['screenshots'];
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($screenshots, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        foreach($images as $index => $image){
            $imageSrc  = $image->getAttribute('src');
            list($type, $imageSrc) = explode(';', $imageSrc);

            list(, $imageSrc)  = explode(',', $imageSrc);
            $imageData = base64_decode($imageSrc);


            $image_name = "/upload/". time() . Str::random(10) . '.png';

            Storage::disk('public')->put($image_name, $imageData);

            $image->removeAttribute('src');
            $image->setAttribute('src', asset('storage'.$image_name));
        }

        $screenshots = $dom->saveHTML();
        $data['screenshots'] = $screenshots;

        Movie::create($data);
        return redirect()->route('movie.all')->with('alert', 'Your movie has been created successfully');
       
    }

}
