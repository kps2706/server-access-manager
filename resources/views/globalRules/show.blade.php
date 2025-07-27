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
                            Global Rules Management
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('global-rules.index')}}">
                            <i class="me-1" data-feather="user-plus"></i>
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
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Category:</strong></div>
                    <div class="col-md-8">{{ $globalRule->category }}</div>
                </div>

                @if($globalRule->code)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Code:</strong></div>
                    <div class="col-md-8">{{ $globalRule->code }}</div>
                </div>
                @endif

                @if($globalRule->title)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Title:</strong></div>
                    <div class="col-md-8">{{ $globalRule->title }}</div>
                </div>
                @endif

                @if($globalRule->description)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Description:</strong></div>
                    <div class="col-md-8">{{ $globalRule->description }}</div>
                </div>
                @endif

                @if($globalRule->port)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Port:</strong></div>
                    <div class="col-md-8">{{ $globalRule->port }}</div>
                </div>
                @endif

                @if($globalRule->protocol)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Protocol:</strong></div>
                    <div class="col-md-8">{{ $globalRule->protocol }}</div>
                </div>
                @endif

                @if($globalRule->error_code)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Error Code:</strong></div>
                    <div class="col-md-8">{{ $globalRule->error_code }}</div>
                </div>
                @endif

                @if($globalRule->error_message)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Error Message:</strong></div>
                    <div class="col-md-8">{{ $globalRule->error_message }}</div>
                </div>
                @endif

                @if($globalRule->severity)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Severity:</strong></div>
                    <div class="col-md-8">{{ $globalRule->severity }}</div>
                </div>
                @endif

                @if($globalRule->impact_area)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Impact Area:</strong></div>
                    <div class="col-md-8">{{ $globalRule->impact_area }}</div>
                </div>
                @endif

                @if($globalRule->reference_link)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Reference:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ $globalRule->reference_link }}" target="_blank">{{ $globalRule->reference_link }}</a>
                    </div>
                </div>
                @endif

                <div class="row mb-2">
                    <div class="col-md-4"><strong>Created At:</strong></div>
                    <div class="col-md-8">{{ $globalRule->created_at->format('d M Y, h:i A') }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4"><strong>Last Updated:</strong></div>
                    <div class="col-md-8">{{ $globalRule->updated_at->format('d M Y, h:i A') }}</div>
                </div>

            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('global-rules.edit', $globalRule->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('global-rules.index') }}" class="btn btn-secondary">Back</a>
        </div>
            </div>
        </div>
    </div>
</main>

@endsection
