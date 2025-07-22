<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrUpload extends Model
{
    //
    protected $fillable = ['filename', 'uploaded_by'];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
