<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'memorandum_id',
        'is_done',
    ];

    public function memo(){
        return $this->belongsTo(Memorandum::class);
    }
}
