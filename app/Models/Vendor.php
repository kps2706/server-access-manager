<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //
    protected $fillable = ['vendor_id', 'name', 'email', 'mobile', 'company', 'address', 'status'];

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}
