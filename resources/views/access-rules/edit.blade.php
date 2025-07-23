@extends('layouts.app')

@section('title', 'Server Access Controller :')

@section('admin_content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="crosshair"></i></div>
                            Edit Access Rules
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('access-rules.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            back to rule list
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">Access Rule Details</div>
            <div class="card-body">
                <form action="{{ route('access-rules.update', $accessRule->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('access-rules.form', ['accessRule' => $accessRule])

                    <button class="btn btn-primary mt-3">Update</button>
                    <a href="{{ route('access-rules.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
