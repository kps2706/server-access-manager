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
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                             Add New Global Rule
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('global-rules.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Global Rules List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-header">Rule Details</div>
            <div class="card-body">
                <form action="{{ route('global-rules.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" placeholder="e.g., Port, Protocol" required>
                        </div>
                        <div class="col-md-6">
                            <label for="code" class="form-label">Code <span class="text-danger">*</span></label>
                            <input type="text" name="code" class="form-control" placeholder="e.g., PORT-443" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g., HTTPS Port">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Detailed description..." required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="severity" class="form-label">Severity</label>
                            <input type="text" name="severity" class="form-control" placeholder="e.g., High">
                        </div>
                        <div class="col-md-4">
                            <label for="impact_area" class="form-label">Impact Area</label>
                            <input type="text" name="impact_area" class="form-control" placeholder="e.g., Web Access">
                        </div>
                        <div class="col-md-4">
                            <label for="reference_link" class="form-label">Reference Link</label>
                            <input type="url" name="reference_link" class="form-control" placeholder="https://example.com">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recommendation" class="form-label">Recommendation</label>
                        <textarea name="recommendation" class="form-control" rows="2" placeholder="Best practices or mitigation steps..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control" rows="2" placeholder="Any additional notes..."></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('global-rules.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Rule
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
