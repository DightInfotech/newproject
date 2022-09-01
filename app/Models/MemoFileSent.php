<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoFileSent extends Model
{
    protected $table = 'memo_file_sents';
    protected $fillable = [
      'memo_file_id',
      'link_ref',
      'first_name',
      'last_name',
      'email',
      'status',
    ];

    public function memo_file(){
        return $this->belongsTo(MemoFile::class);
    }
}
