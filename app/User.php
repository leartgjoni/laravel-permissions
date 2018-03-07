<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
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

    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
    //laravel accessors
    public function getPermissionsAttribute($value)
    {
        return (array) json_decode($value);
    }

    //laravel mutators
    public function setPermissionsAttribute($value){
        $this->attributes['permissions'] = json_encode($value);
    }

    //check if user has access to certain route (route format: "test.test")
    public function hasAccess($routeName){
        $permissions = ($this->permissions != null) ? $this->permissions : $this->role->permissions;

        $route_name = explode('.',$routeName);
        $permission_key = $route_name[0];
        $permission_value = $route_name[1];

        if(array_key_exists($permission_key, $permissions))
            if(in_array($permission_value, $permissions[$permission_key]))
                return true;

        return false;
    }

    public function isAdmin(){
        if($this->role->slug=='admin') {
            return true;
        }
        else {
            return false;
        }
    }
}