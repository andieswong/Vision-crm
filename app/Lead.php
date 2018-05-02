<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'ciudad', 'estado', 'tel','tel_adic', 'fecha_nac', 'ssn',
        'card', 'exp', 'code', 'servicio_ai', 'paq_ofrecido','tvs_inst', 'dvr', 'horario_inst' , 'descuento',
        'servicios_adic', 'compania_act', 'cod', 'notas', 'estado_lead','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
