<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentComparableGraph extends Model
{
    protected $fillable = ['memorandum_id','page_title','graph_title','graph_label','y_axis','x_axis','graph_values','avg_value','graph_image'];
}
