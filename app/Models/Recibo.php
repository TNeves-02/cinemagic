<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'cliente_id', 'data', 'preco_total_sem_iva', 'iva', 'preco_total_com_iva','nif','nome_cliente','tipo_pagamento','ref_pagamento','recibo_pdf_url'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,"cliente_id","id");
    }

    public function bilhete()
    {
        return $this->hasMany(Cliente::class,"recibo_id","id");
    }
}
