<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoPage extends Model
{
    protected $fillable = [
      'memorandum_id',
      'title',
      'page_number',
      'template',
      'recent_sale_ids',
      'rent_comparable_ids',
      'gallery_ids',
        'demographic_ids',
        'recent_graph_ids',
        'rent_graph_ids'
    ];

    public function memorandum(){
        return $this->belongsTo(Memorandum::class);
    }
}
