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
        'name', 'puesto', 'equipo', 'user', 'num_emp','email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follows()
    {
        return $this->belongsToMany(Lead::class, 'user_leads' , 'user_id' , 'followed_id');
    }

    public function isFollowing(Lead $lead)
    {
        return $this->follows->contains($lead);
    }

}

