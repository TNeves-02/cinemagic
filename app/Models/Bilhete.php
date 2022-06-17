<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;
    protected $fillable = [
        'recibo_id',
        'cliente_id',
        'sessao_id',
        'lugar_id',
        'preco_sem_iva',
        'estado',
      
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,"cliente_id","id");
    }
    
    public function recibo()
    {
        return $this->belongsTo(Recibo::class,"recibo_id","id");
    }

    public function lugar()
    {
        return $this->hasOne(Lugar::class,"id","lugar_id");
    }

    public function sessao()
    {
        return $this->hasOne(Sessao::class,"sessao_id","id");
    }

}

