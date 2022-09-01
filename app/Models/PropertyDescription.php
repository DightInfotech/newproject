<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDescription extends Model
{
    protected $fillable = [
      'memorandum_id',
        'cover_page_1',
        'column1',
        'column2',
        'column3',
        'invest_highlights1',
        'highlights_image1',
        'highlights_image2',
        'highlights_image3',
        'highlights_image4',
        'invest_highlights2',
        'parcel_number',
        'zoning',
        'type_of_ownership',
        'density_units_per_acre',
        'parking',
        'parking_ratio',
        'landscaping',
        'topography',
        'water',
        'electric',
        'gas',
        'foundation',
        'framing',
        'exterior',
        'parking_surface',
        'roof',
        'hvac',
        'loc_amenities',
        'amenity_image1',
        'amenity_image2',
        'amenity_image3',
        'unit_amenities',
        'plat_map1',
        'plat_map2',
        'area_map1',
        'area_map2',
        'arial_image1',
        'arial_image2'
    ];
}
