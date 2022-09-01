<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketComparable extends Model
{
    protected $fillable = [
        'memorandum_id',
        'name',
        'image',
        'address',
        'on_market_date',
        'units',
        'total_units',
        'price_per_unit',
        'year_built',
        'sale_price',
        'price_per_sf',
        'cap_rate',
        'grm',
        'notes'
    ];
}
