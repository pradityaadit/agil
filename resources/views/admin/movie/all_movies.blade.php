@extends('admin.layout.base')

@section('title', 'Posts')

@section('contents')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        <div class="card-header bg-warning text-center">
                            <h3 class="card-title font-weight-bold">All Posts</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMovies as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->title }}</td>
                                            <td class="text-center">{{ $item->category_id }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-{{ $item->status == 'Active' ? 'success' : 'danger' }} text-black">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('post.draft', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-info btn-sm mx-2">Draft</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 text-center">
                                {{ $allMovies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Alert Notification -->
@if (Session::has('alert'))
    <script>
        alert("{{ Session::get('alert') }}");
    </script>
@endif
@endsection
