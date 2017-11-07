<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;
use Mejenguitas\User;

class RequestAdmin extends Model
{
    

    //protected $table = '';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
