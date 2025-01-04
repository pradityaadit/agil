<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $guarded = [];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}
