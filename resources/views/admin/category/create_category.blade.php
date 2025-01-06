@extends('admin.layout.base')
@section('title', 'Create Category')
@section('contents')
<div class="content-wrapper">
    <!-- Main Content -->
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-header bg-warning text-center">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Category Name -->
                                <div class="form-group">
                                    <label for="category_name" class="font-weight-bold">Category Name</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control"
                                        value="{{ old('category_name') }}" placeholder="Enter category name" required>
                                    @error('category_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Save Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Success Alert -->
@if (Session::has('alert'))
    <script>
        alert("{{ Session::get('alert') }}");
    </script>
@endif
@endsection
