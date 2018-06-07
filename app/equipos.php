<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    protected $fillable = [
        'equipo',
        ];
    public function integrantes()
    {
        return $this->belongsToMany(User::class, 'equipos_users' , 'team_id' , 'user_id');
    }
}
