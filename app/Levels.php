<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    protected $fillable = [
        "level"
        ];

    public function integrantes()
    {
        return $this->belongsToMany(User::class, 'levels_users', 'level_id', 'user_id');

    }
}
