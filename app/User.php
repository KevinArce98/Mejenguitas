<?php

namespace Mejenguitas;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Mejenguitas\Role;
use Mejenguitas\RequestAdmin;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook_user_id', 'name', 'email', 'password', 'avatar', 'phone' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function request()
    {
        return $this->hasOne(RequestAdmin::class);
    }

    public function hasRoles(array $roles)
    {
        return $this->roles->pluck('name')->intersect($roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function isMod()
    {
        return $this->hasRoles(['mod']);
    }

    public function requestHave($id){
        $data = RequestAdmin::where('user_id', $id)->first();
        
        if (isset($data)) {
            switch ($data->status) {
                   case 'C':
                       return false;
                       break;
                   case 'N':
                       return false;
                       break;
                   case 'D':
                      return false;
                       break;
               }
        }else{
            return true;
        }
    }

    public function getUrlAttribute()
    {
        if (substr($this->avatar, 0, 4) == "http") {
            return $this->avatar;
        }

        return '/img/users/' . $this->avatar;
    }
}
