<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;

class RequestAdmin extends Model
{
    

    //protected $table = '';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'message' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user',
    ];
}
