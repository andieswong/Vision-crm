<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puestos extends Model
{
    protected $fillable = [
        'puesto',
    ];

    public function integrantes()
    {
        return $this->belongsToMany(User::class, 'puestos_users', 'puesto_id', 'user_id');

    }
}
