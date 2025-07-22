<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessRule extends Model
{
    //
    protected $fillable = ['server_id', 'source_ip', 'destination_ip', 'port', 'protocol', 'is_allowed', 'remarks'];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
