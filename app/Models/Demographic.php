<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demographic extends Model
{
    protected $fillable = [
      'memorandum_id',
        'section_cover',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5'
    ];
}
