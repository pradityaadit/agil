@extends('admin.layout.base')

@section('title')
    Create Movie
@endsection

@section('contents')
    <div class="content-wrapper pt-2">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create New Movie</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('movie.new') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="title">Movie Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="date">Release Date</label>
                                        <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
                                        @error('date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="video_type">Video Type (HD, Pre-DVD, etc.)</label>
                                        <input type="text" id="video_type" name="video_type" class="form-control" value="{{ old('video_type') }}">
                                        @error('video_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="movie_info">Movie Information</label>
                                        <textarea name="movie_info" id="movie_info" rows="5" class="form-control">{{ old('movie_info') }}</textarea>
                                        @error('movie_info')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Movie Description</label>
                                        <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail Image</label>
                                        <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                        @error('thumbnail')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                                        @error('meta_title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" rows="5" class="form-control">{{ old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                                        @error('meta_keywords')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group text-center pt-2">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
