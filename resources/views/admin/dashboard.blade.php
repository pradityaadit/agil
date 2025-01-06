@extends('admin.layout.base')

@section('title', 'Dashboard')

@section('contents')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <!-- Main Dashboard Content -->
        <div class="row mx-auto">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Welcome to the Admin Dashboard</h3>
                        </div>
                        <div class="card-body">
                            <p>Hello, welcome back to the admin panel. Here you can manage your site content and view important metrics related to your site performance. Use the cards above for quick stats on users, posts, approvals, and deletions.</p>
                            <hr>
                            <p>Stay organized and keep track of important tasks through this dashboard.</p>
                        </div>
                    </div>
                </div>
        </div>

    </section>
</div>

@endsection
