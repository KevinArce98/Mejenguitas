<?php

namespace Mejenguitas;

use Illuminate\Database\Eloquent\Model;
use Mejenguitas\User;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email_receive', 'subject', 'body', 'read'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function isRead($message)
    {
        return $message->read == true;
    }
}
