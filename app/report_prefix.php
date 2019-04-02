<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report_prefix extends Model
{
    protected $fillable = [
        'report', 'user_id', 'prefix_id',
    ];
    public function report()
    {
        return $this->belongsTo(prefijo::class , 'prefix_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
