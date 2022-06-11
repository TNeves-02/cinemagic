<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nif', 'tipo_pagamento', 'ref_pagamento',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','id');
    }

    public function recibo()
    {
        return $this->hasOne(Recibo::class,'id','cliente_id');
    }

    public function bilhete()
    {
        return $this->hasOne(Bilhete::class,'id','cliente_id');
    }

}
