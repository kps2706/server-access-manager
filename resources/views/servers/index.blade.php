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
                <form method="GET" action="{{ route('server.index') }}" class="mb-3 row">
                    <div class="col-md-3">
                        <select name="zone" class="form-control">
                            <option value="">All Zones</option>
                            <option value="{{encrypt('MZ')}}" {{ request('zone') === encrypt('MZ') ? 'selected' : '' }}>MZ</option>
                            <option value="{{encrypt('DMZ')}}" {{ request('zone') === encrypt('DMZ') ? 'selected' : '' }}>DMZ</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="vendor_id" class="form-control">
                            <option value="">All Vendors</option>
                            @foreach($vendors as $vendor)
                                <option value="{{ encrypt($vendor->id) }}" {{ request('vendor_id') === encrypt($vendor->id) ? 'selected' : '' }}>
                                    {{ $vendor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="environment" class="form-control">
                            <option value="">All Environments</option>
                            <option value="{{encrypt('Production')}}" {{ request('environment') === encrypt('Production') ? 'selected' : '' }}>Production</option>
                            <option value="{{encrypt('Staging')}}" {{ request('environment') === encrypt('Staging') ? 'selected' : '' }}>Staging</option>
                            <option value="{{encrypt('Development')}}" {{ request('environment') === encrypt('Development') ? 'selected' : '' }}>Development</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
                {{-- Code for Donwload Button --}}
                @php
                    $exportParams = [
                        'zone' => request('zone') ? Crypt::decrypt(request('zone')) : null,
                        'vendor_id' => request('vendor_id') ? Crypt::decrypt(request('vendor_id')) : null,
                        'environment' => request('environment') ? Crypt::decrypt(request('environment')) : null,
                    ];

                    // dd($exportParams); // Debugging line to check the export parameters

                @endphp

                <a href="{{ route('server.export', $exportParams) }}" class="btn btn-success btn-sm mb-2">
                    <i class="fas fa-download"></i> Download Filtered Data
                </a>
                {{-- Code for showing the fillter applied --}}
            @php
                use Illuminate\Support\Facades\Crypt;

                $decryptedZone = null;
                $decryptedEnvironment = null;
                $decryptedVendorId = null;

                try {
                    if (request()->filled('zone')) {
                        $decryptedZone = Crypt::decrypt(request('zone'));
                    }
                    if (request()->filled('environment')) {
                        $decryptedEnvironment = Crypt::decrypt(request('environment'));
                    }
                    if (request()->filled('vendor_id')) {
                        $decryptedVendorId = Crypt::decrypt(request('vendor_id'));
                    }
                } catch (\Exception $e) {
                    // silently fail or log error
                }
            @endphp

            @if(request()->hasAny(['zone', 'vendor_id', 'environment']))
                <div class="mb-2">
                    <strong>Filters Applied:</strong>

                    @if($decryptedZone)
                        <span class="badge bg-info">{{ $decryptedZone }}</span>
                    @endif

                    @if($decryptedVendorId)
                        @php
                            $vendorName = $vendors->firstWhere('id', $decryptedVendorId)?->name ?? 'Unknown Vendor';
                        @endphp
                        <span class="badge bg-info">{{ $vendorName }}</span>
                    @endif

                    @if($decryptedEnvironment)
                        <span class="badge bg-info">{{ $decryptedEnvironment }}</span>
                    @endif

                    <a href="{{ route('server.index') }}" class="btn btn-sm btn-secondary ms-2">Clear</a>
                </div>
            @endif
            <table  id="datatablesSimple" >
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
