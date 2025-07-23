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
                            Access Rules Management
                        </h1>
                        <div class="page-header-subtitle">Use this blank page as a starting point for creating new pages inside your project!</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('access-rules.create')}}">
                            <i class="me-1" data-feather="crosshair"></i>
                            Add New Rule
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
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Source IP</th>
                        <th>Destination IP</th>
                        <th>Port</th>
                        <th>Protocol</th>
                        <th>Allowed?</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accessRules as $rule)
                        <tr>
                            <td>{{ $rule->source_ip }}</td>
                            <td>{{ $rule->destination_ip }}</td>
                            <td>{{ $rule->port }}</td>
                            <td>{{ $rule->protocol }}</td>
                            <td>{{ $rule->is_allowed ? 'Yes' : 'No' }}</td>
                            <td>{{ $rule->remarks }}</td>
                            <td>
                                <a href="{{ route('access-rules.edit', $rule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('access-rules.destroy', $rule->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
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
