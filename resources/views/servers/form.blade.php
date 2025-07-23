@php
    $zones = ['MZ' => 'MZ', 'DMZ' => 'DMZ'];
    $locations = ['DC' => 'Data Center', 'DR' => 'Disaster Recovery'];
    $environments = ['Production' => 'Production', 'Staging' => 'Staging', 'Development' => 'Development'];
@endphp

<div class="mb-3">
    <label>Hostname</label>
    <input type="text" name="hostname" value="{{ old('hostname', $server->hostname ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>IP Address</label>
    <input type="text" name="ip_address" value="{{ old('ip_address', $server->ip_address ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Zone</label>
    <select name="zone" class="form-control" required>
        @foreach($zones as $key => $label)
            <option value="{{ $key }}" @selected(old('zone', $server->zone ?? '') == $key)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Operating System</label>
    <input type="text" name="os" value="{{ old('os', $server->os ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Environment</label>
    <select name="environment" class="form-control">
        @foreach($environments as $key => $label)
            <option value="{{ $key }}" @selected(old('environment', $server->environment ?? '') == $key)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Location</label>
    <select name="location" class="form-control">
        @foreach($locations as $key => $location)
            <option value="{{ $key }}" @selected(old('location', $server->location ?? '') == $key)>{{ $location }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Vendor</label>
    <select name="vendor_id" class="form-control">

       @foreach($vendors as $vendor)
            <option value="{{ $vendor->id }}"
                @selected(old('vendor_id', $server->vendor_id ?? '') == $vendor->id)>
                {{ $vendor->name }} ({{ $vendor->vendor_id }})
            </option>
        @endforeach

    </select>
</div>
