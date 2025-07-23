@extends('layouts.app')
@section('title', 'Vendor Edit')
@section('admin_content')

<main>
     <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            Edit Vendors
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('vendor.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            back to list of Vendors
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">Vendor Details</div>
                    <div class="card-body">
                    <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
                        @method('PUT')
                        @include('vendors.form')
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>

@endsection
