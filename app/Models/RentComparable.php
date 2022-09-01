<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentComparable extends Model
{
    protected $fillable = [
        'memorandum_id',
        'name',
        'image',
        'address',
        'occupancy',
        'units',
        'total_units',
        'year_built',
        'notes'
    ];
}
