<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
    protected $fillable = ['hostname', 'ip_address', 'zone', 'vendor_id', 'os', 'location', 'environment'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function accessRules()
    {
        return $this->hasMany(AccessRule::class);
    }
}
