<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoFile extends Model
{
    protected $fillable = [
        'file_name',
        'memorandum_id'
    ];

    public function memorandum(){
        return $this->belongsTo(Memorandum::class);
    }
    public function memo_file_sents(){
        return $this->hasMany(MemoFileSent::class);
    }
}
