<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Vendor::create([
            'vendor_id' => 'SYS001',
            'name'      => 'System User',
            'email'     => 'sysuser@example.com',
            'mobile'    => '9999999999',
            'company'   => 'Internal',
            'address'   => 'N/A',
            'status'    => 'active',
        ]);
    }
}
