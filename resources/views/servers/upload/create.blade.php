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
                            <div class="page-header-icon"><i data-feather="server"></i></div>
                            Upload Servers Data
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('server.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            back to server list
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
            <div class="card-body">
                <form action="{{ route('servers.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Upload Excel File -->
                    <div>
                        <label for="excel">Upload Server Excel</label>
                        <input type="file" name="excel" required>
                    </div>

                    <!-- Upload License -->
                    <div>
                        <label for="license_file">Upload License Screenshot</label>
                        <input type="file" name="license_file">
                    </div>

                    <!-- Upload Invoice -->
                    <div>
                        <label for="invoice_file">Upload Invoice</label>
                        <input type="file" name="invoice_file">
                    </div>

                    <button type="submit">Import</button>
                </form>

            </div>
        </div>
    </div>
</main>

@endsection
