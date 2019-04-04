<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prefijo extends Model
{
    protected $fillable = [
        'prefijo', 'estado', 'usuario',
    ];
    public function user()
    {
        return $this->belongsTo(User::class , 'usuario');
    }
    public function reports()
    {
        return $this->hasMany(report_prefix::class , 'prefix_id');
    }
}
