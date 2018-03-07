<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected static function boot() {
        parent::boot();
        static::deleting(function($role) {
            $role->users()->delete();
        });
    }

    public function users()
    {
        return $this->hasMany('App\User', 'role_id');
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
        $permissions = $this->permissions;

        $route_name = explode('.',$routeName);
        $permission_key = $route_name[0];
        $permission_value = $route_name[1];

        if(array_key_exists($permission_key, $permissions))
            if(in_array($permission_value, $permissions[$permission_key]))
                return true;

        return false;
    }
}