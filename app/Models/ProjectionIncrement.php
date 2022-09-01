<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectionIncrement extends Model
{
    protected $fillable = [
      'memorandum_id',
      'year',
      'market_rents',
      'loss_to_lease',
      'vacancy_loss',
      'concessions',
      'non_revenue_units',
      'other_income',
      'total_operating_expenses'
    ];
}
