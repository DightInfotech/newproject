<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentComparableField extends Model
{
    protected $fillable = [
        'memorandum_id',
        'section_cover',
        'map_image',
        'map_subjects',
        'avg_occupancy',
        'occupancy_graph2_image',
        'avg_rent_1bd',
        'avg_rent_2bd'
    ];
}
