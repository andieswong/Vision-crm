<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
        'notification', 'user', 'user_id', 'estado',
    ];
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
