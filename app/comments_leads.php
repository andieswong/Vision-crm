<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments_leads extends Model
{
    protected $fillable = [
        'comment', 'user_id', 'lead_id',
    ];
    public function lead()
    {
        return $this->belongsTo(Lead::class , 'lead_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
