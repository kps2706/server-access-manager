<p>Total Records: {{ count($servers) }}</p>
<table>
    <thead>
        <tr>
            <th>Hostname</th>
            <th>IP Address</th>
            <th>Zone</th>
            <th>Environment</th>
            <th>assetType</th>
            <th>Vendor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($servers as $server)
            <tr>
                <td>{{ $server->hostname }}</td>
                <td>{{ $server->ip_address }}</td>
                <td>{{ $server->zone }}</td>
                <td>{{ $server->environment }}</td>
                <td>{{ $server->assetType }}</td>
                <td>{{ $server->vendor->name ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
