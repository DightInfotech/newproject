<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketPlan extends Model
{
    protected $fillable = [
      'memorandum_id',
      'section_cover',
      'column1',
      'column2',
      'column3',
      'column4'
    ];
}
