<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['title', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //Permission может иметь много User через модель Role.
    // Связь «ко многим через»
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Role');
    }

}
