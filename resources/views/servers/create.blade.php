@extends('layouts.app')
@section('title', 'Server Access Controller : Add Server')

@section('admin_content')

<main>
     <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            Add Server
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('server.index')}}">
                            <i class="me-1" data-feather="arrow-back"></i>
                            Back to Server List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">Server Details</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
           <form action="{{ route('server.store') }}" method="POST">
                @csrf
                @include('servers.form')
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('server.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
        </div>
    </div>

</main>




@endsection
