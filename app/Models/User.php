<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','telephone','avatar','status','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasRole($roleNames){
        $granted = explode("|", $roleNames);
        return in_array($this->roles()->first()->name, $granted) ? true : false;
    }

    public function isAdmin(){
        return ($this->roles()->first()->name == 'Admin') ? true : false;
    }

    public function setPasswordAttribute(string $value){
        $this->attributes['password'] = Hash::make($value);
    }
}
