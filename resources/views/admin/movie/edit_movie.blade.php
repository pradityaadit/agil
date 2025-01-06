@extends('admin.layout.base')

@section('contents')
<form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Optional, not needed if you use a PUT route, but if you want it as POST, leave it -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Edit Movie</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="movie_info">Movie Info</label>
                            <textarea class="form-control" id="movie_info" name="movie_info" rows="4">{{ $movie->movie_info }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            @if ($movie->thumbnail)
                                <img src="{{ asset('/thumbnails/' . $movie->thumbnail) }}" alt="Thumbnail" width="100" class="mt-2">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $movie->description }}</textarea>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">Update Movie</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
