<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MixUnit extends Model
{
    protected $fillable = [
      'memorandum_id',
      'number_of_units',
        'unit_type',
        'sq_feet',
        'current_rent_min',
        'current_rent_max',
        'rent_per_sf',
        'monthly_income',
        'proforma_rent_min',
        'proforma_rent_max',
        'rent_per_sf2',
        'monthly_income2',
        'isNC'
    ];
}
