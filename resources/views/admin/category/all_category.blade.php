@extends('admin.layout.base')
@section('title', 'Category')
@section('contents')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title font-weight-bold">All Categories</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>id</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->category_name }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-{{ $item->category_status == 'Active' ? 'success' : 'danger' }} text-black">
                                                    {{ $item->category_status }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-primary mx-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-sm btn-danger mx-1" onclick="return confirm('Are you sure you want to delete this category?');">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
