<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }
}
