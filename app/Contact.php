<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{


    protected $fillable  = [
        'telefono','nombre','user_id','estado'
    ];
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
