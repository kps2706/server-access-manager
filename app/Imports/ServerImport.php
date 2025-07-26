<?php

namespace App\Imports;

use App\Models\Server;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServerImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $row = $row->toArray();

        // Log or dump for debugging
        logger()->info('Importing row:', $row);

        // Skip row if any required field is missing
        if (
            empty($row['hostname']) ||
            empty($row['ip_address']) ||
            empty($row['zone']) ||
            empty($row['os']) ||
            empty($row['location']) ||
            empty($row['environment'])
        ) {
            logger()->warning('Skipping row due to missing data', $row);
            return;
        }

        $server = Server::create([
            'hostname'     => $row['hostname'],
            'ip_address'   => $row['ip_address'],
            'zone'         => $row['zone'],
            'vendor_id'    => $row['vendor_id'] ?? 1,
            'os'           => $row['os'],
            'location'     => $row['location'],
            'environment'  => $row['environment'],
            'assetType'    => $row['assettype'] ?? null,
        ]);

        // $server->save();
        // logger()->info("Saved server with ID: " . $server->id);
        // return $server;
    }
}

