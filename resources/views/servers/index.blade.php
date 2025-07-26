@extends('layouts.app')
@section('title', 'Server Access Controller : List of Servers')

@section('admin_content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="server"></i></div>
                            Servers Management
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('servers.upload')}}">
                            <i class="me-1" data-feather="upload-cloud"></i>
                            Upload Servers
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="{{route('server.create')}}">
                            <i class="me-1" data-feather="server"></i>
                            Add New Server
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">Server Details</div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hostname</th>
                            <th>IP</th>
                            <th>Zone</th>
                            <th>OS</th>
                            <th>Environment</th>
                            <th>Vendor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($servers as $server)
                        <tr>
                            <td>{{ $server->hostname }}</td>
                            <td>{{ $server->ip_address }}</td>
                            <td>{{ $server->zone }}</td>
                            <td>{{ $server->os }}</td>
                            <td>{{ $server->environment }}</td>
                            <td>{{ $server->vendor->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('server.edit', $server->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('server.destroy', $server->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
