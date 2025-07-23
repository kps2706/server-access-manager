@extends('layouts.app')

@section('title', 'Server Access Controller : CR File Uploads')

@section('admin_content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="upload-cloud"></i></div>
                            Add New Change Request (CR)
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('cr-uploads.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to CR List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">CR Details</div>
            <div class="card-body">
                <form method="POST" action="{{ route('cr-uploads.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Upload Excel File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
