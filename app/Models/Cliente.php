<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nif', 
        'tipo_pagamento', 
        'ref_pagamento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','id');
    }

    public function recibo()
    {
        return $this->hasOne(Recibo::class,'cliente_id','id');
    }

    public function bilhete()
    {
        return $this->hasOne(Bilhete::class,'cliente_id','id');
    }

}
