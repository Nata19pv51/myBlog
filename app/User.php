<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperVisor()
    {
        if ($this->roles->contains('title', 'Supervisor')) {
            return true;
        }

        return false;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function permissions()
    {
        return $this->hasManyThrough('App\Permission', 'App\Role');
    }

    public function hasRole($role)
    {
        if ($this->isSuperVisor()) {
            return true;
        }
        if (is_string($role)) {
            return $this->role->contains('title', $role);
        }
        return !! $this->roles->intersect($role)->count();
    }

}
