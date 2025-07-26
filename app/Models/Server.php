<?php

namespace App\Models;

use App\Models\Vendor;
use App\Models\AccessRule;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
    protected $fillable = [
    'hostname', 'ip_address', 'zone', 'vendor_id',
    'os', 'location', 'environment', 'assetType',
    'license_file', 'invoice_file'
];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function accessRules()
    {
        return $this->hasMany(AccessRule::class);
    }
}
