<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pre extends Model
{
    protected $fillable = [
        'id','pre',
    ];
    public function prefijos()
    {
        return $this->hasMany(prefijo::class , 'pre');
    }
}
