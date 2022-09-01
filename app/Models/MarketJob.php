<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketJob extends Model
{
    protected $fillable = [
        'memorandum_id',
        'is_done',
    ];

    public function market(){
        return $this->belongsTo(Memorandum::class);
    }
}
