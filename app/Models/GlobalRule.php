<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalRule extends Model
{
    //
    protected $fillable = [
        'category',
        'code',
        'title',
        'description',
        'severity',
        'impact_area',
        'recommendation',
        'reference_link',
        'remarks',
    ];
}
