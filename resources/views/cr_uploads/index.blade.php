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
                            CR Management
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('cr-uploads.create')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New CR
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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Filename</th>
                            <th>Uploaded By</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uploads as $upload)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $upload->filename }}</td>
                                <td>{{ $upload->uploader->name }}</td>
                                <td>{{ $upload->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
