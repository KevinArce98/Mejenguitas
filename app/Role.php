<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   
 	public function users()
 	{
 		return $this->belongsToMany(User::class, 'assigned_roles');
 	}
}
