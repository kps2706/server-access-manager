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
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('global-rules.create') }}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New Rules
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Global Rule Details</div>
            <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Severity</th>
                        <th>Impact Area</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Severity</th>
                        <th>Impact Area</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($rules as $rule)
                        <tr>
                            <td>{{ $rule->category }}</td>
                            <td>{{ $rule->code }}</td>
                            <td>{{ $rule->title ?? '-' }}</td>
                            <td>{{ $rule->severity ?? '-' }}</td>
                            <td>{{ $rule->impact_area ?? '-' }}</td>
                            <td>
                                <a href="{{ route('global-rules.show', $rule) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('global-rules.edit', $rule) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('global-rules.destroy', $rule) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No rules found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $rules->links() }}</div>
            </div>
        </div>
    </div>
</main>

@endsection
