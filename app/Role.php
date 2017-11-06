<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Role extends Model
{
    protected  $fillable = ['title'];

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
