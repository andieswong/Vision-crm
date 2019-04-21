<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable = [
        'sms','to','from','estado','user_id','lead_id','contact_id',
    ];
    public function lead()
    {
        return $this->belongsTo(Lead::class , 'lead_id');
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class , 'contact_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
