<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentSaleField extends Model
{
    protected $fillable = [
        'memorandum_id',
        'section_cover',
        'map_image',
        'map_subjects',
        'avg_cap_rate',
        'avg_grm_rate',
        'avg_price_sf',
        'avg_price_unit'
    ];
}
